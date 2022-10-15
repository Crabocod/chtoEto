<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Songs;

class SongsController extends Controller
{
    public function index(){

        $songs = Songs::join('song_files', 'songs.id', '=', 'song_files.song_id')
            ->get();

        $songs_block = '';
        foreach ($songs as $song) {
            $songs_block .= view('templates.songs', ['song' => $song]);
        }

        return view('songs', ['songs_block' => $songs_block]);
    }
}
