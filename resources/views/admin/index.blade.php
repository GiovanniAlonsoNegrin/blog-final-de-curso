@extends('adminlte::page')

@section('title', 'Full Games')

@section('content_header')
    <h1 class="text-center bg-info rounded">Full Games</h1>
@stop

@section('content')
    <h2 class="text-center bg-primary rounded">Bienvenido al panel de administración del blog Full Games</h2>
    <div class="row">
        <div class="col-6">
            <img class="img-fluid rounded" style="max-height: 600px" src="https://cdn.pixabay.com/photo/2017/08/07/18/27/businessman-2606502_1280.jpg" alt="Imagen">
        </div>
        <div class="col-6">
            <img class="img-fluid rounded" style="max-height: 600px" src="https://cdn.pixabay.com/photo/2017/08/07/18/27/businessman-2606506_1280.jpg" alt="Imagen">
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-12">
            <h2 class="text-center">ATENCIÓN AL CLIENTE 24H</h2>
            <img class="img-fluid rounded mx-auto d-block" src="https://www.dutchieshostel.com/wp-content/uploads/2016/12/24h.png" alt="Imagen">
        </div>
    </div>  
    <div class="row align-items-center">
        <div class="col-12">
            <a href="#">
                <img class="img-fluid rounded mx-auto d-block" src="https://telefonoatencioncliente.com.ar/wp-content/uploads/2020/03/LogoMakr_76UQKl.png" alt="Imagen">
            </a>
            
        </div>
    </div>  
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop