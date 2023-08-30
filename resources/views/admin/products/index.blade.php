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
                                <th class="column-title">Название</th>
                                <th class="column-title">Описание</th>
                                <th class="column-title">Цена, тг</th>
                                <th class="column-title">Количество, шт</th>
                                <th class="column-title">Категория</th>
                                <th class="column-title">Есть скидка?</th>
                                <th class="column-title">Актуальность</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                                <tr class="even pointer">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->category?->name }}</td>
                                    <td>{{ $item->has_discount ? 'да' : '-' }}</td>
                                    <td>{{ $item->relevance_weight }}</td>
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
