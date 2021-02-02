@extends('layouts.backend')
@section('content')
{{-- @include('alert') --}}
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Thumbnail</th>
            <th scope="col">Genre</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bands as $index => $band)
            <tr>
                <th scope="row">{{ $bands->count() * ($bands->currentPage()-1) + $loop->iteration }}</th>
                <td>{{ $band->name }}</td>
                <td>
                    <img src="{{ asset('storage/'.$band->thumbnail) }}" alt="" srcset="" width="150" height="75">
                </td>
                <td>{{ $band->genres()->get()->implode('name', ', ')}}</td>
                <td>
                    <a href="{{ route('bands.edit', $band->slug) }}" class="btn btn-primary">Edit</a>
                    <div endpoint="{{ route('bands.delete', $band) }}" class="delete d-inline" ></div>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{ $bands->links() }}
@endsection