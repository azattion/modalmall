@extends('layouts.app')

@section('page_title', $type)

@section('content')
    <h1>{{$type}}</h1>
    @foreach($posts as $post)
        <h3>
            @if($post['slug'])
                <a href="{{route('posts.page-show', $post['slug'])}}">
            @else
                <a href="{{route('posts.show', $post['id'])}}">
            @endif
                {{$post['title']}}</a></h3>
        <p>{{$post['date']}}</p>
        <p></p>
    @endforeach
@endsection

