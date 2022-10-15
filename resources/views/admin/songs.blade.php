@extends('layouts.admin')

@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>Text</th>
            <th>Audio</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            {!! $songs !!}
        </tbody>
    </table>
@endsection
