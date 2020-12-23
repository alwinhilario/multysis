@if ($errors->count() > 0)
<div class="alert alert-danger">
    <ul class="m-0">
        @foreach ($errors->all() as $key => $success)
        <li> {{ $success }} </li>
        @endforeach
    </ul>
</div>
@endif