@extends('layouts.app')

@section('content')
<div class="right_col" role="main" style="min-height: 676px;">

    @include('admin.parts.result-messages')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Список пользователей</small></h3>
            </div>
        </div>

        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">ID</th>
                                <th class="column-title">ФИО</th>
                                <th class="column-title">Телефон</th>
                                <th class="column-title">Город</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                                <tr class="even pointer">
                                    <td class="">{{ $item->id }}</td>
                                    <td class="">{{ $item->fio }}</td>
                                    <td class="">{{ $item->phone }}</td>
                                    <td class="">{{ $item->city->name }}</td>
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
