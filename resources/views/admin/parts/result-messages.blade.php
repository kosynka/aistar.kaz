@if(session('success'))
    <div class="row">
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    </div>
@endif

@if(session('error'))
    <div class="row">
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    </div>
@endif

@if(session('alert'))
    <div class="row">
        <div class="alert alert-warning" role="alert">
            {{ session('alert') }}
        </div>
    </div>
@endif
