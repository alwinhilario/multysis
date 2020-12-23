@if (session('mySuccess'))
<div class="alert alert-info">
    <ul class="m-0">
        @foreach (session('mySuccess') as $key => $success)
        <li> {{ $success }} </li>
        @endforeach
    </ul>
</div>
@endif

@if (session('myErrors'))
<div class="alert alert-danger">
    <ul class="m-0">
        @foreach(session('myErrors') as $key => $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif