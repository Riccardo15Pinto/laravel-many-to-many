@if ($technology->exists)
    <form action="{{ route('admin.technologys.update', $technology) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('admin.technologys.store') }}" method="POST">
@endif
@csrf
<div class="row">
    <div class="col-12 py-2">
        <label for="label" class="form-label">Nome Tipologia:</label>
        <input type="text"
            class="form-control @error('label') is-invalid @elseif(old('label')) is-valid @enderror"
            id="label" placeholder="Inserisci il nome della tipologia" name="label"
            value="{{ old('label', $technology->label ?? '') }}">
        @error('label')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 py-2">
        <label for="info" class="form-label">Info</label>
        <input type="text"
            class="form-control @error('info') is-invalid @elseif(old('info')) is-valid @enderror"
            id="info" placeholder="Inserisci il nome del colore scelto" name="info"
            value="{{ old('info', $technology->info ?? '') }}">
        @error('info')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-12 py-2">
        <label for="color" class="form-label">Tipo Colore :</label>
        <select class="form-select" name="color">
            @foreach (config('tech') as $item)
                <option value="{{ old('color', $item['color'] ?? '') }}">
                    <span class="text-{{ $item['color'] }}">{{ $item['info'] }}</span>
                </option>
            @endforeach

        </select>
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
