@extends('layouts.app')

@section('page_title', $post['meta_title']??$post['title'])
@section('page_desc', $post['meta_desc'])
@section('page_url', route('posts.show', $post['id']))
@section('page_keywords', $post['meta_keywords'])

@section('content')
    <h1>{{$post['title']}}</h1>
    <p>{{$post['date']}}</p>
    <div class="post__admin" style="margin: 5px 0">
        <a target="_blank" href="{{route('admin.posts.edit', $post['id'])}}">
            Редактировать публикацию
        </a>
    </div>
    @if($post->images)
        <div class="row">
            @foreach($post->images as $image)
                <div class="col-md-3">
                    <img class="img-fluid"
                         src="/storage{{$image['path']}}/{{$image['name']}}.{{$image['ext']}}">
                </div>
            @endforeach
        </div>
    @endif
    {!! $post['text'] !!}
@endsection

