@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')

    <a class="btn btn-success btn-sm float-right" href="{{ route('admin.categories.create') }}">Crear categoría</a>
    <h1>Lista de categorías</h1>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                            </td>
                            <td width="10px">
                                {{-- <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('delete') --}}

                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-slug="{{ $category->slug }}" data-title="{{ $category->name }}">Eliminar</button>
                                {{-- </form> --}}
                            </td>
                        </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea borrar la categoría selececionada?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <form id="formDelete" action="{{ route('admin.categories.destroy', $category) }}" method="post">
                        @csrf
                        @method('delete')
    
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>  
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        window.onload = function () {
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var slug = button.data('slug') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                
                var title = button.data('title')
   
                var modal = $(this)
                modal.find('.modal-title').text('Vas a borrar la categoría: ' + title)
            });
        };
    </script>
@endsection
