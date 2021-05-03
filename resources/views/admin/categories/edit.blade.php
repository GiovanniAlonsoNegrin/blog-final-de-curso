@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')
    <h1>Editar Categorías</h1>
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
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>
                <div class="form-group">
                    {!! Form::label('slug','slug', ['hidden']) !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la categoría', 'readonly', 'hidden']) !!}
                </div>

                {!! Form::submit('Actualizar categoría', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection