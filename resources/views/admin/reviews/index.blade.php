@extends('layouts.app')

@section('content')
<div class="right_col" role="main" style="min-height: 676px;">
    @include('admin.parts.result-messages')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Список отзывов</h3>
            </div>
            @include('parts.buttons.create', ['route' => 'reviews'])
        </div>

        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">ID</th>
                                <th class="column-title">Пользователь</th>
                                <th class="column-title">Продукт</th>
                                <th class="column-title">Заголовок</th>
                                <th class="column-title">Текст</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                                <tr class="even pointer">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user ? $item->user->fio : 'Пользователь не найден' }}</td>
                                    <td>{{ $item->product?->name }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->text }}</td>
                                    <td class="">
                                        @include('parts.buttons.edit', ['route' => 'reviews'])
                                        @include('parts.buttons.destroy', ['route' => 'reviews'])
                                    </td>
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
