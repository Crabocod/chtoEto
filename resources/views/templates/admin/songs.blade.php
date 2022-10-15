<tr>
    <input type="hidden" name="id" value="{{$song['id']}}">
    <td><input type="text" name="title" value="{{$song['title']}}"></td>
    <td><input type="text" name="text" value="{{$song['text']}}"></td>
    <td>
        <audio controls="controls" src="/storage/{{$song['file']}}"></audio>
        <input type="file" class="form-control-file" name="audio" accept=".mp3,audio/*">
    </td>
    <td><button type="button" class="btn btn-primary save-song">Save</button></td>
    <td><button type="button" class="btn btn-danger delete-song">Delete</button></td>
</tr>
