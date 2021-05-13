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

        <div class="card-body">

            @forelse ($comments as $comment)

                <div class="form-group">

                    <p>Post: {{ $comment->post_id }} | Autor: {{ $comment->user->name }} | Fecha de creación: {{ $comment->created_at->format('d-m-Y H:i:s') }}</p>

                    <div class="row">
                        <div class="ml-2">

                            {!! Form::model($comment, ['route' => ['admin.comments.update', $comment], 'method' => 'put']) !!}

                                {!! Form::label('message','Comentario') !!}
                                {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el comentario', 'rows' => '3']) !!}

                                {!! Form::hidden('status', '2') !!}

                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                {!! Form::submit('Validar', ['class' => 'btn btn-primary mt-2 mr-1 float-left']) !!}

                            {!! Form::close() !!}

                            {!! Form::model($comment, ['route' => ['admin.comments.destroy', $comment], 'method' => 'delete', 'class' => 'form-inline']) !!}

                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger mt-2']) !!}

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            @empty
                <strong>No hay ningún comentario pendiente de moderación...</strong>
            @endforelse

        </div>
        
    </div>
@stop
