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
                                <th class="column-title">Пользователь</th>
                                <th class="column-title">Тип оплаты</th>
                                <th class="column-title">Статус оплаты</th>
                                <th class="column-title">Цена</th>
                                <th class="column-title">Статус заказа</th>
                                <th class="column-title">Город</th>
                                <th class="column-title">Адрес</th>
                                <th class="column-title">Комментарий</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                                <tr class="even pointer">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->fio }}</td>
                                    <td>{{ $item->getPaymentType() }}</td>
                                    <td>{{ $item->getPaymentStatus() }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->getStatus() }}</td>
                                    <td>{{ $item->city?-name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->comment }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
