<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Songs;
use App\Models\SongFiles;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.main');
    }

    public function allSongs(){

        $songs = Songs::join('song_files', 'songs.id', '=', 'song_files.song_id')
            ->get();

        $songs_block = '';
        foreach ($songs as $song) {
            $songs_block .= view('templates.admin.songs', ['song' => $song]);
        }

        return view('admin.songs', ['songs' => $songs_block]);
    }

    public function addSong(Request $r)
    {

        $validator = $r->validate([
            'audio' => 'required|max:10000',
            'title' => 'required|string',
            'text' => 'string'
        ]);
        $path = Storage::put('public', $r->file('audio'));
        $path = str_replace('public/', '', $path);

        $songID = Songs::create([
            'title' => $r->title,
            'text' => $r->text
        ])->id;

        SongFiles::create([
            'song_id' => $songID,
            'file' => $path
        ]);

        return response()->json(['result' => 'success'], 200);
    }

    public function saveSong(Request $r)
    {

        $validator = $r->validate([
            'audio' => 'max:10000',
            'title' => 'string',
            'text' => 'string'
        ]);

        Songs::where('id', $r->id)->update([
            'title' => $r->title,
            'text' => $r->text
        ]);

        if ($r->file('audio') != null) {
            SongFiles::where('song_id', $r->id)->delete();

            $path = Storage::put('public', $r->file('audio'));
            $path = str_replace('public/', '', $path);
            SongFiles::create([
                'song_id' => $r->id,
                'file' => $path
            ]);
        }

        return response()->json(['result' => 'success'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
