@extends('layouts.app')

@section('title', "Публикация")

@section('content')
    <h1>{{$post['title']}}</h1>
    <p>{{$post['date']}}</p>
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