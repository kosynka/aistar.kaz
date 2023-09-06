@extends('layouts.app')

@section('content')
<div class="right_col" role="main" style="min-height: 676px;">
    @include('admin.parts.result-messages')

    <div class="col">
        <div class="col-m-12">
            <h3>{{ $title }}</h3>
        </div>

        <div class="col-m-12">
            <form action="{{ $route }}" method="POST">
                @csrf
                @method($method)

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="title">Заголовок</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ isset($announcements) ? $announcements->title : old('title') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="description">Описание</label>
                    <div class="col-sm-10">
                        <textarea
                            name="description"
                            id="description"
                            class="form-control @error('description') is-invalid @enderror"
                        >{{ isset($announcements) ? $announcements->description : old('description') }}</textarea>
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="start_at">Дата начала</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="start_at"
                            id="start_at"
                            class="form-control @error('start_at') is-invalid @enderror"
                            value="{{ isset($announcements) ? $announcements->start_at : old('start_at') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="end_at">Дата окончания</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="end_at"
                            id="end_at"
                            class="form-control @error('end_at') is-invalid @enderror"
                            value="{{ isset($announcements) ? $announcements->end_at : old('end_at') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="category_id">Категория</label>
                    <div class="col-sm-10">
                        <select name="category_id" id="category_id" class="form-control">
                            <option></option>
                            @foreach ($categories as $category)
                                @if (isset($announcement->category_id) && $announcement->category_id === $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @elseif (old('category_id') != null && old('category_id') === $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success m-4">Сохранить</button>
            </form>
        </div>
    </div>
</div>
@endsection
