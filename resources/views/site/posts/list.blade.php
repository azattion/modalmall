@extends('layouts.app')

@section('title', $type)

@section('content')
    <h1>{{$type}}</h1>
    @foreach($posts as $post)
        <h3><a href="{{route('posts.show', $post['id'])}}">{{$post['title']}}</a></h3>
        <p>{{$post['date']}}</p>
        <p></p>
    @endforeach
@endsection

