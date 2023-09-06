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
                    <label class="col-sm-2 col-form-label" for="name">Название</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ isset($product) ? $product->name : old('name') }}"
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
                        >{{ isset($product) ? $product->description : old('description') }}</textarea>
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="price">Цена</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="price"
                            id="price"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ isset($product) ? $product->price : old('price') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="discount_price">Цена со скидкой</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="discount_price"
                            id="discount_price"
                            class="form-control @error('discount_price') is-invalid @enderror"
                            value="{{ isset($product) ? $product->discount_price : old('discount_price') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="amount">Количество</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="amount"
                            id="amount"
                            class="form-control @error('amount') is-invalid @enderror"
                            value="{{ isset($product) ? $product->amount : old('amount') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="category_id">Категория</label>
                    <div class="col-sm-10">
                        <select name="category_id" id="category_id" class="form-control">
                            <option></option>
                            @foreach ($categories as $category)
                                @if (isset($product->category_id) && $product->category_id === $category->id)
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
