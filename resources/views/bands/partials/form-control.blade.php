<div class="form-group">
    <label for="thumbnail">Thumbnail</label>
    <input type="file" name="thumbnail" id="thumbnail" class="form-control-file">
    @error('thumbnail')
        <div class="div-mt-2 text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Nama Band</label>
    <input type="text" name="name" id="nama" class="form-control" value="{{ old('name') ?? $band->name }}">
    @error('name')
        <div class="div-mt-2 text-danger">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    <label for="genres">Genre</label>
    <select name="genres[]" id="genres" class="form-control s2m" multiple="multiple">
        @foreach ($genres as $genre)
        <option {{ $band->genres()->find($genre->id) ? 'selected' : '' }} value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
    @error('genres')
        <div class="div-mt-2 text-danger">{{$message}}</div>
    @enderror
</div>

<button class="btn btn-primary" type="submit">{{ $submit }}</button>