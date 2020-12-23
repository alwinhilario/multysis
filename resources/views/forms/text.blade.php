<div class="col-{{ $body ?? 'auto' }} form-group">
    <label for="{{$id}}"> {{$label}} </label>
    <input type="text" id="{{$id}}" name="{{$id}}" class="form-control @error($id) is-invalid @enderror" value="{{ old($id) ?? $value ?? '' }}">

    @error($id)
    <span class="d-block invalid-feedback">
        {{ $message }}
    </span>
    @enderror
</div>