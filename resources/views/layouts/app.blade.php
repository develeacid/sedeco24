@extends('adminlte::page')
@section('title', 'Pandel de Aministración')
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
@section('content_header')
	<h1>Panel</h1>
@stop
@section('content')
    {{ $slot }}
@stop
@section('css')
	<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@livewireScripts
@section('js')
	<script> console.log('Hi!'); </script>
@stop
