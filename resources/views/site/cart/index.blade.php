@extends('layouts.app')

@section('title', "Корзина")

@section('content')

    <h1>Корзина</h1>

    @if(count($cart))
        <form method="post" action="{{route('user.order.store')}}">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @php $colors = config('services.colors'); @endphp
            @php $sizes = config('services.sizes'); @endphp
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Наименование товара</th>
                    <th></th>
                    <th>Количество</th>
                    <th>Дополнительно</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $key => $product)
                    @php if(!isset($products[$product['id']])) continue; @endphp
                    <tr>
                        <td>
                            <a target="_blank"
                               href="{{route('products.show', $product['id'])}}">
                                @if(isset($products[$product['id']]['images'][0]))
                                    <img class="img-fluid" style="width: 80px"
                                         src="/storage{{$products[$product['id']]['images'][0]['path']}}/sm/{{$products[$product['id']]['images'][0]['name']}}.{{$products[$product['id']]['images'][0]['ext']}}">
                                @else
                                    <img class="img-fluid" style="width: 80px"
                                         src="http://www.scppa.org/image.axd?picture=/2018/04/photo_not_available.png">
                                @endif
                            </a>
                        </td>
                        <td>
                            <input type="hidden" name="id[]" value="{{$product['id']}}">
                            <a target="_blank" title="{{$products[$product['id']]['name']}}"
                               href="{{route('products.show', $product['id'])}}">
                                {{$products[$product['id']]['name']}}
                            </a>
                        </td>
                        <td>
                            @if($products[$product['id']]['available'])
                                {{--<span class="badge badge-primary">В наличии</span>--}}
                            @else
                                <span class="badge badge-danger">Предзаказ</span>
                            @endif
                        </td>
                        <td>
                            <input style="width: 100px" name="qt[{{$product['id']}}]" class="form-control"
                                   value="{{$product['qt']}}"
                                   type="number" min="1"
                                   step="1">
                        </td>
                        <td>
                            <input type="hidden" name="color[{{$product['id']}}]" value="{{$product['color']}}">
                            @if($product['color'])
                                Цвет: {{$colors[$product['color']]}}
                            @endif
                            <input type="hidden" name="size[{{$product['id']}}]" value="{{$product['size']}}">
                            @if($product['size'])
                                <br/>Размер: {{$sizes[$product['size']]}}
                            @endif
                        </td>
                        <td>
                            <a href="{{route('user.cart.delete', $product['id'])}}" class="btn btn-link">Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <style>
                .table td {
                    vertical-align: middle;
                }
            </style>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Номер телефона</label>
                        <input name="phone" required value="{{old('phone', auth()->user()['phone'])}}"
                               class="form-control @error('phone') is-invalid @enderror" type="phone" id="phone"
                               placeholder="Введите номер телефона">
                    </div>
                    <div class="form-group">
                        <label for="email">Электронная почта</label>
                        <input name="email" required value="{{old('email', auth()->user()['email'])}}" type="email"
                               class="form-control @error('email') is-invalid @enderror" id="email"
                               placeholder="Введите электронную почту">
                    </div>
                    <div class="form-group">
                        <label for="address">Адрес доставки</label>
                        <input name="address" required value="{{old('address', auth()->user()['address'])}}" type="text"
                               class="form-control @error('address') is-invalid @enderror" id="address"
                               placeholder="Введите адрес доставки">
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" required name="agree" value="1">
                            Я согласен с условиями Публичной оферты
                        </label>
                    </div>
                    <button class="btn btn-success" type="submit">Оформить заказ</button>
                </div>
            </div>
        </form>
    @else
        <div class="row">
            <div class="col-md-12">
                <p>Корзина пуста</p>
            </div>
        </div>
    @endif
@endsection

