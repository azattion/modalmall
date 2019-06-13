@extends('layouts.admin')

@section('title', 'Товары')

@section('content')
    <div class="row">
        {{--<div class="col-md-3"></div>--}}
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$product->id?"Изменить":"Добавить"}} товар</h3>
                </div>
                <!-- /.box-header -->
                {{--                {{dd($product)}}--}}
                        <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data"
                      action="{{$product->id ? route('admin.products.update', $product->id) : route('admin.products.store')}}">
                    {{ csrf_field() }}
                    @if($product->id) @method('PUT') @endif
                    <div class="box-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group @error('name') has-error @enderror">
                            <label for="name">Название</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Введите название"
                                   value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input {{old('status', $product->status)?'checked':''}} name="status" value="1"
                                       type="checkbox">
                                Активный
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @error('vendor_code') has-error @enderror">
                                    <label for="vendor_code">Код</label>
                                    <input type="text" name="vendor_code" class="form-control" id="vendor_code"
                                           placeholder="Введите код"
                                           value="{{ old('vendor_code', $product->vendor_code) }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @error('vendor_code') has-error @enderror">
                                    <label for="vendor_code">Штрих-код</label>
                                    <input type="text" name="barcode" class="form-control" id="barcode"
                                           placeholder="Введите штрих-код"
                                           value="{{ old('barcode', $product->barcode) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @error('collection') has-error @enderror">
                                    <label for="collection">Коллекция</label>
                                    <input type="text" name="collection" class="form-control" id="collection"
                                           placeholder="Введите коллекцию"
                                           value="{{ old('collection', $product->collection) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group @error('quantity') has-error @enderror">
                                    <label for="quantity">Количество</label>
                                    <input type="number" min="0" name="quantity" class="form-control" id="quantity"
                                           placeholder="Введите количество"
                                           value="{{ old('quantity', $product->quantity) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @error('price') has-error @enderror">
                                    <label for="price">Стоимость</label>
                                    <div class="input-group">
                                        <input type="number" min="0" name="price" class="form-control" id="price"
                                               placeholder="Введите стоимость" autocomplete="off"
                                               value="{{ old('price', $product->price) }}">
                                        <span class="input-group-addon">RUB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group @error('composition') has-error @enderror">
                                    <label for="composition">Состав</label>
                                    <input type="text" name="composition" class="form-control" id="composition"
                                           placeholder="Введите состов продукта" autocomplete="off"
                                           value="{{ old('composition', $product->composition) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @error('unit') has-error @enderror">
                                    <label for="unit">Единица измерения</label>
                                    <label for="unit">Цвет</label>
                                    <select name="unit" class="form-control" id="unit">
                                        <option value="0">Выберите..</option>
                                        <?php $units = config('services.units'); ?>
                                        @foreach($units as $key => $unit)
                                            <option @if(($product->unit == old('unit', $product->unit))) selected
                                                    @endif value="{{$key}}">{{$unit}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @error('colors') has-error @enderror">
                                    <label for="colors">Цвет</label>
                                    <select name="colors[]" multiple class="form-control" id="colors">
                                        {{--<option value="0">Выберите..</option>--}}
                                        <?php $colors = config('services.colors');
                                        $color_selected = $product->colors ? explode("|", trim($product->colors, '|')) : [];?>
                                        @foreach($colors as $key => $color)
                                            <option @if(in_array($key, old('colors', $color_selected))) selected
                                                    @endif value="{{$key}}">{{$color}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @error('sizes') has-error @enderror">
                                    <label for="sizes">Размеры</label>
                                    <select name="sizes[]" multiple class="select2 form-control" id="sizes">
                                        {{--<option value="0">Выберите..</option>--}}
                                        <?php $sizes = config('services.sizes');
                                        $size_selected = $product->sizes ? explode("|", trim($product->sizes, '|')) : [];?>
                                        @foreach($sizes as $key => $size)
                                            <option @if(in_array($key, old('colors', $size_selected))) selected
                                                    @endif value="{{$key}}">{{$size}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @error('cats') has-error @enderror">
                                    <label for="cats">Категория</label>
                                    <select name="cats[]" multiple class="form-control" id="cats">
                                        {{--<option value="0">Выберите..</option>--}}
                                        <?php $category_selected = $product->cats ? explode("|", trim($product->cats, '|')) : [];?>
                                        @foreach($categories as $cat)
                                            <option @if(in_array($cat->id, old('cats', $category_selected))) selected
                                                    @endif value="{{$cat->id}}">{{$cat['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @error('brand') has-error @enderror">
                                    <label for="brand">Бренды</label>
                                    <select name="brand" class="form-control" id="brand">
                                        <option value="0">Выберите..</option>
                                        <?php $brands = config('services.brands'); ?>
                                        @foreach($brands as $key => $cat)
                                            <option @if(old('brand', $product->brand)==$key) selected
                                                    @endif value="{{$key}}">{{$cat}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @error('producer') has-error @enderror">
                                    <label for="producer">Страна производитель</label>
                                    <select name="producer" class="form-control" id="producer">
                                        <option value="0">Выберите..</option>
                                        <?php $producers = config('services.producers'); ?>
                                        @foreach($producers as $key=>$producer)
                                            <option @if(old('producer', $product->producer)==$key) selected
                                                    @endif value="{{$key}}">{{$producer}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group @error('images') has-error @enderror">
                            <label for="images">Фотографии</label>
                            <input accept="image/*" type="file" name="images[]" multiple id="images">
                            <p class="help-block">Максимальный размер 3 Мб</p>
                            @if(count($product->images))
                                <div class="row">
                                    @foreach($product->images as $image)
                                        <div class="col-sm-2">
                                            <a target="_blank"
                                               href="/public/storage{{$image['path']}}/lg/{{$image['name']}}.{{$image['ext']}}"><img
                                                        class="img-responsive"
                                                        src="/public/storage{{$image['path']}}/sm/{{$image['name']}}.{{$image['ext']}}"></a>
                                            <div class="checkbox"><label><input type="checkbox" value="{{$image['id']}}"
                                                                                name="image-del[{{$image['id']}}]">
                                                    Удалить</label></div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="form-group @error('desc') has-error @enderror">
                            <label for="desc">Описание</label>
                        <textarea rows="5" name="desc" class="form-control wysihtml5" id="desc"
                                  placeholder="Характеристика">{{ old('desc', $product->desc) }}</textarea>
                        </div>

                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Метки</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="display: none;">
                                <div class="checkbox">
                                    <label>
                                        {{--<input {{$product->as_new || old('as_new')?'checked':''}} name="as_new"--}}
                                        {{--value="1"--}}
                                        {{--type="checkbox">--}}
                                        Новинка
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group @error('as_new_start_date') has-error @enderror">
                                            <label for="as_new_start_date">Дата начало</label>
                                            <input type="text" name="as_new_start_date" class="datepicker form-control"
                                                   id="as_new_start_date"
                                                   placeholder="Введите дату" autocomplete="off"
                                                   value="{{ old('as_new_start_date', $product->as_new_start_date) }}">

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group @error('as_new_end_date') has-error @enderror">
                                            <label for="as_new_end_date">Дата конца</label>
                                            <input type="text" name="as_new_end_date" class="datepicker form-control"
                                                   id="as_new_end_date"
                                                   placeholder="Введите дату" autocomplete="off"
                                                   value="{{ old('as_new_end_date', $product->as_new_end_date) }}">

                                        </div>
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        {{--<input {{$product->sale || old('sale')?'checked':''}} name="sale"--}}
                                        {{--value="1"--}}
                                        {{--type="checkbox">--}}
                                        Скидка
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group @error('sale_start_date') has-error @enderror">
                                            <label for="sale_start_date">Дата начало</label>
                                            <input type="text" name="sale_start_date" class="datepicker form-control"
                                                   id="sale_start_date"
                                                   placeholder="Введите дату" autocomplete="off"
                                                   value="{{ old('sale_start_date', $product->sale_start_date) }}">

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group @error('sale_end_date') has-error @enderror">
                                            <label for="sale_end_date">Дата конца</label>
                                            <input type="text" name="sale_end_date" class="datepicker form-control"
                                                   id="sale_end_date"
                                                   placeholder="Введите дату" autocomplete="off"
                                                   value="{{ old('sale_end_date', $product->sale_end_date) }}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Поисковая оптимизация</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body" style="display: none;">
                                <div class="form-group @error('meta_title') has-error @enderror">
                                    <label for="meta_title">Заголовок</label>
                                    <input type="text" name="meta_title" class="form-control" id="meta_title"
                                           placeholder="Введите название"
                                           value="{{ old('meta_title', $product->meta_title) }}">
                                </div>
                                <div class="form-group @error('meta_desc') has-error @enderror">
                                    <label for="meta_desc">Описание</label>
                        <textarea name="meta_desc" class="form-control" id="meta_desc"
                                  placeholder="Характеристика">{{ old('meta_desc', $product->meta_desc) }}</textarea>
                                </div>
                                <div class="form-group @error('meta_keywords') has-error @enderror">
                                    <label for="meta_keywords">Ключевые слова</label>
                                    <input type="text" name="meta_keywords" class="form-control" id="meta_keywords"
                                           placeholder="Введите ключевые слова"
                                           value="{{ old('meta_keywords', $product->meta_keywords) }}">
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button style="margin-right: 10px;" name="save-2double" value="1" type="submit"
                                class="btn btn-default pull-left">Сохранить
                            и дублировать
                        </button>
                        <button name="save-2new" value="1" type="submit" class="btn btn-default pull-left">Сохранить и
                            новый
                        </button>
                        <button name="save-2list" value="1" type="submit" class="btn btn-primary pull-right">
                            <i class="fa fa-save"></i> Сохранить
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="/public/css/admin/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/public/js/admin/select2.full.min.jss">
    <script src="/public/js/admin/bootstrap-datepicker.min.js"></script>
    <script src="/public/js/admin/select2.full.min.js"></script>
    <script>
        //Date picker
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        })
        $(document).ready(function(){
            $('.select2').select2();
        });
    </script>
@endsection