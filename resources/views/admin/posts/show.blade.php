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
                        <div class="row">
                            <div class="ml-2">
                                <a class="btn btn-primary mb-3" href="{{ route('admin.comments.edit', $comment) }}">Actualizar</a>
                            </div>
                            <div class="ml-1">
                                <form action="{{ route('admin.comments.destroy', $comment) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No existen comentarios para este post</p>
                @endforelse 
            </div>
        </div>
    </div>
@stop