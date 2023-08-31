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
                @method( $method )

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="name">Название</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ isset($category) ? $category->name : old('name') }}"
                        >
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="name">Родительская категория</label>
                    <div class="col-sm-10">
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option></option>
                            @foreach ($categories as $parent)
                                @if(isset($category->parent_id) && $category->parent_id === $parent->id)
                                    <option value="{{ $parent->id }}" selected>{{ $parent->name . '  >  ' . $parent->parent?->name }}</option>
                                @elseif(old('parent_id') != null && old('parent_id') === $parent->id)
                                    <option value="{{ $parent->id }}" selected>{{ $parent->name . '  >  ' . $parent->parent?->name }}</option>
                                    @else
                                    <option value="{{ $parent->id }}">{{ $parent->name . '  >  ' . $parent->parent?->name }}</option>
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
