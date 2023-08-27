@extends('layouts.app')

@section('content')
<div class="right_col" role="main" style="min-height: 676px;">
    @include('admin.parts.result-messages')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Список продуктов</h3>
            </div>
        </div>

        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">ID</th>
                                <th class="column-title">ID Пользователя</th>
                                <th class="column-title">ID Продукта</th>
                                <th class="column-title">Заголовок</th>
                                <th class="column-title">Текст</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                                <tr class="even pointer">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->product_id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->text }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

