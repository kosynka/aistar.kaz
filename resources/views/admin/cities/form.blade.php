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
                @if ($method === 'PUT')
                    @method('PUT')
                @endif

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="name">Название</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ isset($city) ? $city->name : old('name') }}"
                        >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row m-3">
                    <label class="col-sm-2 col-form-label" for="region">Регион</label>
                    <div class="col-sm-10">
                        <input
                            type="text"
                            name="region"
                            id="region"
                            class="form-control @error('region') is-invalid @enderror"
                            value="{{ isset($city) ? $city->region : old('region') }}"
                        >
                        @error('region')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-success m-4">Сохранить</button>
            </form>
        </div>
    </div>
</div>
@endsection
