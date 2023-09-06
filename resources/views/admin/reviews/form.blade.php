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
                    <label class="col-sm-2 col-form-label" for="user_id">Пользователь</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="user_id"
                            id="user_id"
                            class="form-control @error('user_id') is-invalid @enderror"
                            value="{{ isset($review) ? $review->user_id : old('user_id') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="product_id">Продукт</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="product_id"
                            id="product_id"
                            class="form-control @error('product_id') is-invalid @enderror"
                            value="{{ isset($review) ? $review->product_id : old('product_id') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="title">Заголовок</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ isset($review) ? $review->title : old('title') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="text">Текст</label>
                    <div class="col-sm-10">
                        <textarea
                            name="text"
                            id="text"
                            class="form-control @error('text') is-invalid @enderror"
                        >{{ isset($review) ? $review->text : old('text') }}</textarea>
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="rating">Рейтинг</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="rating"
                            id="rating"
                            class="form-control @error('rating') is-invalid @enderror"
                            value="{{ isset($review) ? $review->rating : old('rating') }}"
                        >
                    </div>
                </div>

                <button type="submit" class="btn btn-success m-4">Сохранить</button>
            </form>
        </div>
    </div>
</div>
@endsection
