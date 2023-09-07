@if ($type->exists)
    <form action="{{ route('admin.types.update', $type) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('admin.types.store') }}" method="POST">
@endif
@csrf
<div class="row">
    <div class="col-12 py-2">
        <label for="label" class="form-label">Nome Tipologia:</label>
        <input type="text"
            class="form-control @error('label') is-invalid @elseif(old('label')) is-valid @enderror"
            id="label" placeholder="Inserisci il nome della tipologia" name="label"
            value="{{ old('label', $type->label ?? '') }}">
        @error('label')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 py-2">
        <label for="color" class="form-label">Tipo Colore :</label>
        <input type="color"
            class="form-control @error('color') is-invalid @elseif(old('color')) is-valid @enderror"
            id="color" name="color" value="{{ old('color', $type->color ?? '') }}">
        @error('color')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<button type="submit" class="btn btn-success my-3">
    <i class="fa-regular fa-floppy-disk"></i>
    Save
</button>
</form>
