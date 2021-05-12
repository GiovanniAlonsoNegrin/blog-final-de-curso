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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post</th>
                            <th>Contenido</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->post_id }}</td>
                                <td>{{ $comment->message }}</td>
                                <td width="10px">
                                    @can('admin.categories.edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.comments.edit', $comment) }}">Editar</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.categories.destroy', Model::class)
                                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro...</strong>
            </div> 
        @endif
        
    </div>
@stop
