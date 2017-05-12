@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <b>Success: </b> {{ Session::get('success') }}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <b>Errors: </b>
        <ul>
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif