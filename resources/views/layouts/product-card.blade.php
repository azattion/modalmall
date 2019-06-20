<div class="product">
    <a href="{{route('products.show', ['id' => $product['id']])}}">
        <div class="product__cover">
            @if(isset($product->images[0]))
                <img class="product__img img-fluid"
                     src="/storage{{$product->images[0]['path']}}/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">
            @endif
            @if(time() > strtotime($product['as_new_start_date']) && time() < strtotime($product['as_new_end_date']))
                <div class="product__new">
                    <img class="img-fluid" src="/img/new.png" alt="">
                </div>
            @endif
            @if(time() > strtotime($product['sale_start_date']) && time() < strtotime($product['sale_end_date']))
                <div class="product__sale">
                    <img class="img-fluid" src="/img/sale.png" alt="">
                </div>
            @endif
        </div>
        <div class="product__cost text-center">{{$product['price']}} RUB</div>
        <div class="product__name text-center">{{$product['name']}}</div>
    </a>
</div>