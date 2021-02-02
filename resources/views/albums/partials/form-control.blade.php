<div class="form-group">
    <label for="band" >Band</label>
    <select name="band" id="band" class="form-control">
        <option disabled selected>Choose a band</option>
        @foreach ($bands as $band)
            <option {{ $band->id == $album->band_id ? "selected" : " "}} value="{{ $band->id }}">{{ $band->name }}</option>
        @endforeach
    </select>
    @error('band')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="name">Album Name</label>
    <input type="text" class="form-control" name="name" id="name" value=" {{ old('name') ?? $album->name}}">

    @error('name')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="year">Year</label>
    <select name="year" id="year" class="form-control">
        <option disabled selected>Choose year</option>

        @for ($i = 1990; $i<=date("Y"); $i++)
            <option {{ $album->year == $i ? "selected" : ""}} value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
    @error('year')
        <div class="mt-2 text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ $submitBtn }}</button>