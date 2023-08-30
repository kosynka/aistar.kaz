@extends('layouts.app')

@section('content')
<div class="right_col" role="main" style="min-height: 676px;">

    @include('admin.parts.result-messages')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Редактирование категории</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <label for="level">Уровень вложенности</label>
                                <input type="text" name="level" id="level" class="form-control" value="{{ old('level', $category->level ?? '') }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
