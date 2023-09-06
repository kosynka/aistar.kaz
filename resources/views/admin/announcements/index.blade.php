@extends('layouts.app')

@section('content')
<div class="right_col" role="main" style="min-height: 676px;">

    @include('admin.parts.result-messages')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Список Объявление</small></h3>
            </div>
            @include('parts.buttons.create', ['route' => 'announcements'])
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
                                <th class="column-title">Активен от</th>
                                <th class="column-title">Активен до</th>
                                <th class="column-title">Катеогория</th>
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
                                    <td class="">{{ $item->category?->name }}</td>
                                    <td class="">
                                        @include('parts.buttons.edit', ['route' => 'announcements'])
                                        @include('parts.buttons.destroy', ['route' => 'announcements'])
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
