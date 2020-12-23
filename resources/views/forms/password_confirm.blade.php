<div class="col-{{ $body ?? 'auto' }} form-group">
    <label for="{{$id . '_confirmation'}}"> {{$label}} </label>
    <input type="password" id="{{$id . '_confirmation'}}" name="{{$id . '_confirmation'}}" class="form-control @error($id) is-invalid @enderror">

    @error($id)
    <span class="d-block invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>