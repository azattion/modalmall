@extends('layouts.app')

@section('title', $post['title'])

@section('content')
    <h1>{{$post['title']}}</h1>
    <p>{{$post['date']}}</p>
    <div class="post__admin">
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

