<div class="list-group mb-5">
    <a href="#" class="list-group-item list-group-item-action active">
      Dashboard
    </a>
</div>

<div class="mb-5">
    <small class="text-secondary d-block mb-2 text-uppercase">Band</small>
    <div class="list-group">
        <a href="{{ route('bands.create') }}" class="list-group-item list-group-item-action {{ Request::is('bands/create') ? 'list-group-item-secondary':''}}">Tambah Band</a>
        <a href="{{ route('bands.table') }}" class="list-group-item list-group-item-action {{ Request::is('bands/table') ? 'list-group-item-secondary':''}}">Daftar Band</a>
    </div>
</div>

<div class="mb-5">
    <small class="text-secondary d-block mb-2 text-uppercase">Album</small>
    <div class="list-group">
        <a href="{{ route('albums.create') }}" class="list-group-item list-group-item-action {{ Request::is('albums/create') ? 'list-group-item-secondary':''}}">Tambah Album</a>
        <a href="{{ route('albums.table') }}" class="list-group-item list-group-item-action {{ Request::is('albums/table') ? 'list-group-item-secondary':''}}">Daftar Album</a>
    </div>
</div>

<div class="mb-5">
    <small class="text-secondary d-block mb-2 text-uppercase">Genre</small>
    <div class="list-group">
        <a href="{{ route('genres.create') }}" class="list-group-item list-group-item-action">Tambah Genre</a>
        <a href="{{ route('genres.table') }}" class="list-group-item list-group-item-action">Daftar Genre</a>
    </div>
</div>