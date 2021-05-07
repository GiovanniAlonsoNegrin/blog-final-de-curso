@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')
    
    @can('admin.categories.create')
        <a class="btn btn-success btn-sm float-right" href="{{ route('admin.tags.create') }}">Crear Etiqueta</a>
    @endcan
    
    <h1>Lista de etiquetas</h1>
    
@stop

@section('content')

    @if (session('info')) 
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        @if ($tags->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td width="10px">
                                    @can('admin.tags.edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit', $tag) }}">Editar</a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.tags.destroy')
                                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="post">
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
