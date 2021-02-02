@extends('layouts.backend')
@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Genre</th>
            <th scope="col">Band</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($genres as $index => $genre)
        <tr>
            <th scope="row">{{ $genres->count() * ($genres->currentPage() - 1) + $loop->iteration}}</th>
            <td>{{ $genre->name }}</td>
            <td>{{ 0 }}</td>
            <td>
                <a href="{{ route('genres.edit', $genre->slug) }}" class="btn btn-primary">Edit</a>
                <div endpoint="{{ route('genres.delete', $genre) }}" class="delete d-inline" ></div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $genres->links() }}
@endsection