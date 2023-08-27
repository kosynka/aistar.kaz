@if ($errors->any())
    <div class="row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Список ошибок</label>
        <div class="col-md-6">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>
@endif