@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@if (session('error'))
    <div class="alert alert-danger" style="color: red;">
        {{ session('error') }}
    </div>
@endif

