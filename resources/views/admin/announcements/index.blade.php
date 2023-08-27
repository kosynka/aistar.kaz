@extends('layouts.app')

@section('content')
<div class="right_col" role="main" style="min-height: 676px;">

    @include('admin.parts.result-messages')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Список Объявление</small></h3>
            </div>
        </div>

        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">ID</th>
                                <th class="column-title">Заголовок</th>
                                <th class="column-title">Описание</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                                <tr class="even pointer">
                                    <td class="">{{ $item->id }}</td>
                                    <td class="">{{ $item->title }}</td>
                                    <td class="">{{ $item->description }}</td>
                                    <td class="">{{ $item->start_at }}</td>
                                    <td class="">{{ $item->end_at }}</td>
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
