@extends('layouts.backend')
@section('content')
{{-- @include('alert') --}}
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Band</th>
            <th scope="col">Album</th>
            <th scope="col">Year</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($albums as $index => $album)
            <tr>
                <th scope="row">{{ $albums->count() * ($albums->currentPage() - 1) + $loop->iteration }}</th>
                <td>
                    {{ $album->band->name }}
                </td>
                <td>
                    {{ $album->name }}
                </td>
                <td>
                    {{ $album->year }}
                </td>
                <td>
                    <a href="{{ route('albums.edit', $album) }}" class="btn btn-primary">Edit</a>
                    <div endpoint="{{ route('albums.delete', $album) }}" class="delete d-inline" ></div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{ $albums->links() }}
@endsection