@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')
    @livewire('admin.validate-all-comments')
    <h1>Lista de comentarios pendientes de moderación</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Post</th>
                        <th>Autor</th>
                        <th colspan="2">Comentario</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $comment)
                        <tr>
                            <td>{{ $comment->post_id }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td colspan="2">{{ $comment->message }}</td>
                            <td width="10px">
                                {!! Form::model($comment, ['route' => ['admin.comments.update', $comment], 'method' => 'put']) !!}

                                {!! Form::label('message', 'Comentario', 'hidden') !!}
                                {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el comentario', 'rows' => '3', 'hidden']) !!}

                                {!! Form::hidden('status', '2') !!}

                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                @can('admin.comments.validate')
                                    {!! Form::submit('Validar', ['class' => 'btn btn-success btn-sm']) !!}
                                @endcan
                                {!! Form::close() !!}
                            </td>
                            <td width="10px">
                                {!! Form::model($comment, ['route' => ['admin.comments.destroy', $comment], 'method' => 'delete', 'class' => 'form-inline']) !!}

                                @can('admin.comments.destroy')
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                                @endcan
                                {!! Form::close() !!}
                            </td>
                            <td width="10px">
                                @can('admin.comments.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.comments.edit', $comment) }}">Editar</a>
                                @endcan
                            </td>

                        </tr>
                    @empty
                        <strong>No existen comentarios pendientes de moderación...</strong>
                    @endforelse
                </tbody>
            </table>

            {{-- <div class="form-group">

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
                                
                                @can('admin.comments.validate')
                                    {!! Form::submit('Validar', ['class' => 'btn btn-success btn-sm mt-2 mr-1 float-left']) !!}
                                @endcan
                            {!! Form::close() !!}
                            
                            {!! Form::model($comment, ['route' => ['admin.comments.destroy', $comment], 'method' => 'delete', 'class' => 'form-inline']) !!}

                                @can('admin.comments.destroy')
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm mt-2']) !!}
                                @endcan    

                                @can('admin.comments.edit')
                                    <a class="btn btn-primary btn-sm mt-2 ml-1" href="{{ route('admin.comments.edit', $comment) }}">Editar</a>
                                @endcan

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div> --}}

        </div>

        <div class="card-footer">
            {{ $comments->links() }}
        </div>

    </div>

@stop
