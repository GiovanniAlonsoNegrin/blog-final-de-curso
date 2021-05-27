<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del rol']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<h2 class="h3">Lista de permisos</h2>

    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Permiso</th>
                    <th>Acceso</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>  
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            {{ $permission->description }}
                        </td>
                        <td>
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>   
                    </tr>
                @endforeach
            </tbody>
        </table>
        <label>
            
        </label>
    </div>
