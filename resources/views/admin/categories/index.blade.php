@extends('layouts.app')

@section('content')
<div class="right_col" role="main" style="min-height: 676px;">

    @include('admin.parts.result-messages')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Список категорий</h3>
            </div>
            <div class="title_right">
                <div class="pull-right">
                    <a href="{{ route('categories.create') }}" class="btn btn-success">
                        <i class="fa fa-plus"></i> Создать категорию
                    </a>
                </div>
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
                                <th class="column-title">Уровень</th>
                                <th class="column-title">Действия</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                                <tr class="even pointer">
                                    <td class="">{{ $item->id }}</td>
                                    <td class="">{{ $item->name }}</td>
                                    <td class="">{{ $item->level }}</td>
                                    <td class="">
                                        <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-info btn-xs">
                                            <i class="fa fa-pencil"></i> Редактировать
                                        </a>
                                        <form action="{{ route('categories.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i> Удалить
                                            </button>
                                        </form>
                                    </td>
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

