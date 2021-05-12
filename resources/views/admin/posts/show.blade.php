@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')
    <h1>Comentarios</h1>
@stop

@section('content')

    @if (session('info')) 
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="form-outline mb-4">
                @forelse ($post->comments as $comment)
                <div class="form-group">
                    <p>Autor: Fecha de creación: {{ $comment->created_at->format('d-m-Y H:i:s') }} </p>
                    <textarea class="form-control mb-2" name="message" id="message" rows="3">{{ $comment->message }}</textarea>
                    <a class="btn btn-primary mb-3" href="{{ route('admin.comments.update', $comment) }}">Actualizar</a>
                    <a class="btn btn-danger mb-3" href="{{ route('admin.comments.destroy', $comment) }}">Eliminar</a>
                </div>
                    
                @empty
                    <p>No existen comentarios para este post</p>
                @endforelse 
            </div>
        </div>
    </div>
@stop