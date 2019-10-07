@extends('layouts.app')

@section('page_title', $category['meta_title']??$category['name'])
@section('page_desc', $category['meta_desc'])
@section('page_url', route('products.category', $category['id']??0))
@section('page_keywords', $category['meta_keywords'])

@section('content')
    <div class="row">
        <div class="col-sm-2">
            @if(isset($categories) && count($categories))
                <div style="background-color: #EA6385">
                    <ul class="category-nav list-unstyled">
                        @foreach($categories as $cat)
                            <li class="category-nav__item"><a class="category-nav__link"
                                                              href="{{route('products.category', $cat['id'])}}">{{$cat['name']}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-sm-10">
            <h3 class="text-left">{{isset($category['name'])?$category['name']:''}}</h3>
            <form action="{{route('products.category', isset($category['id'])?$category['id']:0)}}" method="get">
                <div class="row">
                    @if($category)
                        <div class="col-sm text-left">
                            <label for="sort">Сортировать по:
                                <select id="sort">
                                    <option value="0">...</option>
                                    <option @if(isset($_GET['sort']) && $_GET['sort'] == 'top' && isset($_GET['order']) && $_GET['order'] == "asc") selected @endif value="{{route('products.category', $category['id'])}}?sort=top&order=asc">
                                        Популярные
                                    </option>
                                    <option @if(isset($_GET['sort']) && $_GET['sort'] == 'cost' && isset($_GET['order']) && $_GET['order'] == "desc") selected @endif value="{{route('products.category', $category['id'])}}?sort=cost&order=desc">
                                        По цене по возрастанию
                                    </option>
                                    <option @if(isset($_GET['sort']) && $_GET['sort'] == 'cost' && isset($_GET['order']) && $_GET['order'] == "asc") selected @endif value="{{route('products.category', $category['id'])}}?sort=cost&order=asc">
                                        По цене по убыванию
                                    </option>
                                </select>
                            </label>
                        </div>
                    @endif
                    <div class="col-sm text-right">
                        <label for="size">Размер: <br>
                            <select name="size" id="size">
                                <option value="0">...</option>
                                @php $sizes = config('services.sizes') @endphp
                                @foreach($sizes as $key => $size)
                                    <option @if(isset($_GET['size']) && $_GET['size'] == $key) selected
                                            @endif value="{{$key}}">{{$size}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-sm text-right">
                        <label for="brand">Бренд: <br>
                            <select name="brand" id="brand">
                                <option value="0">...</option>
                                {{--@php $brands = config('services.brands') @endphp--}}
                                @foreach($brands as $brand)
                                    <option @if(isset($_GET['brand']) && $_GET['brand'] == $brand['id']) selected
                                            @endif value="{{$brand['id']}}">{{$brand['name']}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-sm text-right">
                        <label for="producer">Производитель: <br>
                            <select name="producer" id="producer">
                                <option value="0">...</option>
                                @php $producers = config('services.producers') @endphp
                                @foreach($producers as $key=>$producer)
                                    <option @if(isset($_GET['producer']) && $_GET['producer'] == $key) selected
                                            @endif value="{{$key}}">{{$producer}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>

                    <div class="col-sm">
                        <button type="submit" class="btn btn-link">
                            <img style="width: 35px" src="/img/search.png">
                        </button>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        @include('layouts.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>
            <div class="no-margin pull-right">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('#sort').change(function () {
                window.location = $(this).val();
                return false;
            });
        });
    </script>
@endsection