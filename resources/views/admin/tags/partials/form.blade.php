<div class="form-group">
    {!! Form::label('name','Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la etiqueta']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('slug','Slug', ['hidden']) !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la etiqueta', 'readonly', 'hidden']) !!}
</div>

<div class="form-group">
    {{-- <label for="">Color</label>
    <select name="color" id="" class="form-control">
        <option value="red">Rojo</option>
        <option value="green">Verde</option>
        <option value="blue" selected>Azul</option>
    </select> --}}

    {!! Form::label('color', 'Color') !!}
    {!! Form::select('color', $colors, null, ['class' => 'form-control']) !!}

    @error('color')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>