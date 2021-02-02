@extends('layouts.base')
<x-navbar></x-navbar>
@section('baseStyles')
        <!-- Styles -->
        <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
@endsection

@section('baseScripts')
            <!-- Scripts -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
            <script src="{{ asset('js/backend.js') }}" defer></script>
            @stack('scripts')
@endsection

@section('body')
<div class="container-fluid py-3 ">
    <div class="row">
        <div class="col-md-3">
            <x-sidebar></x-sidebar>
        </div>
        <div class="col-md-9">
                @include('alert')
                @yield('content')
            </div>
        </div>
    </div>
@endsection