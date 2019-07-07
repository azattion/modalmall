<div class="product-card">
    <a href="{{route('products.show', ['id' => $product['id']])}}">
        <div class="product-card__cover">
            @if(isset($product->images[0]))
                <img class="product-card__img img-fluid"
                     src="/storage{{$product->images[0]['path']}}/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">
            @else
                <img class="product-card__img img-fluid"
                     src="/img/image-404.png">
            @endif
            @if(time() > strtotime($product['as_new_start_date']) && time() < strtotime($product['as_new_end_date']))
                <div class="product-card__new">
                    <img class="img-fluid" src="/img/new.png" alt="">
                </div>
            @endif
            @if($product['sale_percent'] && time() > strtotime($product['sale_start_date']) && time() < strtotime($product['sale_end_date']))
                <div class="product-card__sale">
                    <img class="img-fluid" src="/img/sale.png" alt="">
                </div>
            @endif
        </div>
        <div class="product-card__cost text-center">
            @if($product->is_sale)
                {{$product->cost_with_sale}} руб. <span class="product__cost_sale">{{$product['cost']}}  руб.</span> <span class="badge badge-danger">{{$product['sale_percent']}} %</span>
            @else
                <span>{{$product['cost']}}</span> руб.
            @endif
        </div>
        <div class="product-card__name text-center">{{$product['name']}}</div>
        <div class="product__review-value">@if($product->average_rating) {{number_format($product->average_rating, 1)}} @endif</div>
        <div class="product__review-img">
            <div style="width: @if($product->average_rating) {{$product->average_rating*100/5}}% @else 0% @endif"></div>
        </div>
    </a>
</div>