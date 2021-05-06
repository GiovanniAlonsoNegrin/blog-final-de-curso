@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    @if (session('info')) 
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    @livewire('admin.users-index')
@stop