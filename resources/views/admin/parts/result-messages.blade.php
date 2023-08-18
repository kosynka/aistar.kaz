@if(session('success'))
    <div class="row">
        <div class="alert alert-success alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ session('success') }}
        </div>
    </div>
@endif

@if(session('alert'))
    <div class="row">
        <div class="alert alert-warning alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            {{ session('alert') }}
        </div>
    </div>
@endif
