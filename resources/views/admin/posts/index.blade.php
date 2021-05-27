@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')

    <a class="btn btn-success btn-sm float-right" href="{{ route('admin.posts.create') }}">Crear post</a>
    <h1>Lista de mis posts</h1>
@stop

@section('content')

    @if (session('info')) 
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    
    @livewire('admin.post-index')
@stop
