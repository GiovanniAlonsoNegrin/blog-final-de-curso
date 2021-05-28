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
                    <th>Crear/Validar</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
{{--                @php
                    $myPermissions = array ("Panel de control", "Usuarios", "Roles", "Categorías", "Etiquetas", "Posts", "Comentarios");
                @endphp
                @foreach ($permissions as $permission)
                    @foreach($myPermissions as $myPermission)
                        <tr>
                            <td>
                                {{ $myPermission }}
                            </td>
                            <td>
                                {{ $permission->description }}
                            </td>
                            <td>
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                @endforeach--}}
                    <tr>
                        <td>
                            Panel de control
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 1) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1', 'disabled']) !!}
                        </td>
                        <td>
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1', 'disabled']) !!}
                        </td>
                        <td>
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1', 'disabled']) !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Usuarios
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 2) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1', 'disabled']) !!}
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 3) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 4) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Roles
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 5) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 6) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 7) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 8) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Categorías
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 9) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 10) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 11) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 12) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Etiquetas
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 13) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 14) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 15) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 16) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Posts
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 17) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 19) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 20) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 21) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tus posts
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 18) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 19) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 20) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 21) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Comentarios
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 22) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 24) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 25) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                        <td>
                            @foreach ($permissions->where('id', 26) as $permission)
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                            @endforeach
                        </td>
                    </tr>
            </tbody>
        </table>
        <label>

        </label>
    </div>
