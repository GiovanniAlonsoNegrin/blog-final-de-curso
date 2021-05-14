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
                                @if ($post->comments->count())
                                    <a class="btn btn-success btn-sm" href="{{ route('admin.posts.show', $post) }}">Comentarios</a>
                                @else
                                    <a class="btn btn-secondary btn-sm" style="cursor: default;" href="#">Comentarios</a>
                                @endif
                            </td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
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
