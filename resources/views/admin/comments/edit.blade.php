@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')
    <h1>Editar comentarios</h1>
@stop

@section('content')

    @if (session('info')) 
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {{-- Laravel collective --}}
            {!! Form::model($comment, ['route' => ['admin.comments.update', $comment], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('message','Comentario') !!}
                    {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el comentario']) !!}

                    @error('message')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                {!! Form::submit('Actualizar comentario', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop