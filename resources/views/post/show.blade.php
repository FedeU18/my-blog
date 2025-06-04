@extends('layouts.app')

@section('title', 'Post detail')

@section('content')
    <div class="container">
        <h1>Acá se verían el detallo de los posts</h1>
        <p>Post ID: {{ $id }}</p>
    </div>
@endsection
