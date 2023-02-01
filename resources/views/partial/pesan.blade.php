@if (Session::has('success'))
<div class="pt-3">
    <div class="alert alert-success">
        <h6 class="bi bi-check-circle-fill"> {{ Session::get('success') }}</h6>
    </div>
</div>
@endif

@if ($errors->any())
<div class="pt-3">
    <div class="alert alert-danger">
        <ul type="none">
            @foreach ($errors->all() as $item)
            <li class="bi bi-exclamation-triangle-fill"> {{ $item }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif