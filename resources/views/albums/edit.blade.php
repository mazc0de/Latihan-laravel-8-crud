@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <form action="{{ route('albums.edit', $album) }}" method="post">
                @csrf
                @method('put')
                @include('albums.partials.form-control')
            </form>
        </div>
    </div>
@endsection