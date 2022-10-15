@extends('layouts.admin')

@section('content')
    <form class="add-song">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <br>
        <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" id="text" name="text"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="audio">Audio</label>
            <br>
            <input type="file" class="form-control-file" id="audio" name="audio" accept=".mp3,audio/*">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
