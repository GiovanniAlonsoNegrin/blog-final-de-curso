<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un post">
    </div>

    @if ($posts->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Posteado</th>
                        <th colspan="3" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td>
                                @if ($post->status == 1)
                                    NO
                                @else
                                    SI
                                @endif
                            </td>
                            <td width="10px">
                                @can('admin.comments.index')
                                    @if ($post->comments->count())
                                        <a class="btn btn-success btn-sm py-1 px-2" href="{{ route('admin.posts.show', $post) }}">
                                            <div class="row">
                                                <div class="col">
                                                    Comentarios
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 bg-warning rounded">
                                                    <small style="font-size: 10px;">{{count($post->comments->where('status', 2)) ?? '0'}}</small>
                                                </div>
                                                <div class="col-6 bg-secondary rounded">
                                                    <small style="font-size: 10px;">{{count($post->comments->where('status', 1)) ?? '0'}}</small>
                                                </div>
                                            </div>
                                        </a>
                                    @else
                                        <a class="btn btn-secondary btn-sm" style="cursor: default;" href="#">Comentarios</a>
                                    @endif
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.posts.edit')
                                    <a class="btn btn-primary btn-sm mt-2" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    @can('admin.posts.destroy')
                                        <button class="btn btn-danger btn-sm mt-2" type="submit">Eliminar</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro...</strong>
        </div>
    @endif

</div>
