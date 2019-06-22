<div class="category-card">
    <a href="{{route('products.category', $category['id'])}}">
        <div class="category-card__cover">
            @if(isset($category->images[0]))
                <img class="category-card__img img-fluid"
                     src="/storage{{$category->images[0]['path']}}/{{$category->images[0]['name']}}.{{$category->images[0]['ext']}}">
            @else
                <img class="category-card__img img-fluid"
                     src="https://cdn.browshot.com/static/images/not-found.png">
            @endif
        </div>
        <div class="category-card__caption">
            <img class="category-card__icon" style="width: 40px;" src="/img/kids.png"><span class="category-card__name">{{$category['name']}}</span>
        </div>
    </a>
</div>