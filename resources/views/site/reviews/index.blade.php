@extends('layouts.app')

@section('title', "Favorite page")

@section('content')
    @foreach($reviews as $review)
        <div class="row">
            <div class="col-md-2">
                {{$review['created_at']}}
            </div>
            <div class="col-md-2">
                <a target="_blank" href="{{route('products.show', $review['prod_id'])}}">
                    Товар {{$review['prod_id']}}</a>
            </div>
            <div class="col-md-4">
                {{$review['text']}}
            </div>
            <div class="col-md-2">
                <form method="post" action="{{route('user.review.destroy', $review['id'])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection