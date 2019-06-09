@extends('layouts.app')

@section('title', "Favorite products page")

@section('content')
    @foreach($favorites as $favorite)
        <div class="row">
            <div class="col-md-2">
                <a target="_blank" href="{{route('products.show', $favorite['pid'])}}">
                    Товар {{$favorite['pid']}}</a>
            </div>
            <div class="col-md-2">
                <form method="post" action="{{route('user.favorite.destroy', $favorite['id'])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </form>

            </div>
        </div>
    @endforeach
@endsection