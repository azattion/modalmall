<div class="product-card">
    <a href="{{route('products.show', ['id' => $product['id']])}}">
        <div class="product-card__cover">
            @if(isset($product->images[0]))
                <img class="product-card__img img-fluid"
                     src="/storage{{$product->images[0]['path']}}/{{$product->images[0]['name']}}.{{$product->images[0]['ext']}}">
            @else
                <img class="product-card__img img-fluid"
                     src="/img/notfoundphoto.jpg">
            @endif
            @if(time() > strtotime($product['as_new_start_date']) && time() < strtotime($product['as_new_end_date']))
                <div class="product-card__new">
                    <img class="img-fluid" src="/img/new.png" alt="">
                </div>
            @endif
            @if($product['sale_percent'] && time() > strtotime($product['sale_start_date']) && time() < strtotime($product['sale_end_date']))
                <div class="product-card__sale">
                    <img class="img-fluid" src="/img/sale.png" alt="Скидки">
                </div>
            @endif
        </div>
        <div class="product-card__cost text-center">
            @if($product['cost']>0)
                @if($product->is_sale)
                    <span class="product__cost_sale">{{$product['cost']}}  RUB</span> {{$product->cost_with_sale}} RUB <span class="badge badge-modal">{{$product['sale_percent']}} %</span>
                @else
                    <span>{{$product['cost']}}</span> RUB
                @endif
            @endif
        </div>
        <div class="product-card__name text-center">{{$product['name']}}</div>
        <div class="product-card__review">
            <div class="product__review-img product__review-img-sm">
                <div style="width: @if($product->average_rating) {{$product->average_rating*100/5}}% @else 0% @endif"></div>
            </div>
        </div>
    </a>
</div>