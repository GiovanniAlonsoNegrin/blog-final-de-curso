<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o email de un usuario">
        </div>

        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email}}</td>
                                <td>
                                    @forelse ($user->roles as $role)
                                        {{ $role->name }}
                                    @empty
                                        Sin rol
                                    @endforelse
                                </td>
                                <td width="10px">
                                    @can('admin.users.edit')
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', $user) }}">Rol</a>
                                    @endcan
                                </td>
                                @if (auth()->user()->id == $user->id)
                                    <td>
                                        @can('admin.users.edit')
                                            <span class="btn btn-secondary btn-sm">Eliminar</span>
                                        @endcan
                                    </td>
                                @else
                                    <td width="10px">
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            @can('admin.users.edit')
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            @endcan
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros...</strong>
            </div>
        @endif

    </div>
</div>
