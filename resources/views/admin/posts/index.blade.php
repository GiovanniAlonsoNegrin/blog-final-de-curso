@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')

    <a class="btn btn-success btn-sm float-right" href="{{ route('admin.posts.create') }}">Crear post</a>
    <h1>Lista de mis posts</h1>
@stop

@section('content')
    @if (session('info')) 
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    
    @livewire('admin.post-index')
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
                modal.find('.modal-title').text('Vas a borrar el post: ' + title)
            });
        };
    </script>
@endsection
