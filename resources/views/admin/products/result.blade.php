@extends('layouts.admin')

@section('title', 'Товары')

@section('content')
    <form role="form" action="{{route('admin.products.import', $name)}}" method="post"
          enctype="multipart/form-data">
        @csrf
        <div class="box">
            <div class="box-body text-right">
                <button type="submit" name="ok" class="btn btn-primary"><i class="fa fa-upload"></i>
                    Импортировать
                </button>
                <a href="{{route('admin.products.import', $name)}}?cancel" class="btn btn-default"><i class="fa fa-remove"></i>
                    Отменить
                </a>
            </div>
        </div>
        <div class="box box-primary">
            @if(isset($data) && count($data))

                <div class="box-header with-border">
                    <h3 class="box-title">Результат</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <div class="table-response">
                        <style>
                            .text-truncate {
                                max-width: 200px;
                                display: inline-block;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                            }
                        </style>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td colspan="{{$data['header']['count']}}">
                                    <b>Название файла:</b> {{$data['header']['filename']}};
                                    <b>Размер:</b> {{$data['header']['filesize']}} MB;
                                    <b>Найдено:</b> строки - {{$data['header']['count']}}, cтолбцы
                                    - {{$data['body']['count']}};
                                </td>
                            </tr>
                            {{--@php dump($data['body']['content']) @endphp--}}
                            @foreach ($data['body']['content'] as $key => $row)
                                <tr>
                                    <th class="text-center">{{$key}}</th>
                                    @foreach ($row as $k => $item)
                                        {{--<td>{{$item}}</td>--}}
                                        <td class="{{$k}}"><span class="d-inline-block text-truncate">{{$item}}</span></td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </form>

@endsection