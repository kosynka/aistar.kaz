@extends('layouts.app')

@section('content')
<div class="right_col" role="main" style="min-height: 676px;">
    @include('admin.parts.result-messages')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Список заказов</h3>
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
                                <th class="column-title">Тип оплаты</th>
                                <th class="column-title">Статус оплаты</th>
                                <th class="column-title">Цена</th>
                                <th class="column-title">Статус заказа</th>
                                <th class="column-title">ID Города</th>
                                <th class="column-title">Адрес</th>
                                <th class="column-title">Комментарий</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                                <tr class="even pointer">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user_id }}</td>
                                    <td>{{ $item->payment_type }}</td>
                                    <td>{{ $item->payment_status }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->city_id }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->comment }}</td>
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
