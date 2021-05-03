@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')
    <h1>Crear nueva etiqueta</h1>
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
            {!! Form::open(['route' => 'admin.tags.store']) !!}

                @include('admin.tags.partials.form')

                {!! Form::submit('Crear etiqueta', ['class' => 'btn btn-success']) !!}

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