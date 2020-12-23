<div class="col-{{ $body ?? 'auto' }} form-group">
    <label for="{{$id}}"> {{$label}} </label>
    <input type="password" id="{{$id}}" name="{{$id}}" class="form-control @error($id) is-invalid @enderror">

    @error($id)
    <span class="d-block invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>