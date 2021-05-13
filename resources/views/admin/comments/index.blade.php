@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')
    <h1>Lista de comentarios</h1>
@stop

@section('content')
    @if (session('info')) 
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    
    <div class="card">
        @if ($comments->count())
        
            <div class="card-body">

                @foreach ($comments as $comment)    
                    <div class="form-group">

                        <p>Post: {{ $comment->post_id }} | Autor: {{ $comment->user->name }} | Fecha de creación: {{ $comment->created_at->format('d-m-Y H:i:s') }}</p>

                        {!! Form::textarea('message', $comment->message, ['class' => 'form-control mb-2', 'rows' => '3']) !!}

                        <div class="row">
                            <div class="ml-2">
                                <a class="btn btn-primary mb-3" href="">Validar</a>
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
                @endforeach

            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro...</strong>
            </div> 
        @endif
        
    </div>
@stop
