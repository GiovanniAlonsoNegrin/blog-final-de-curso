<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->name }}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-slug="{{ $post->slug }}" data-title="{{ $post->name }}">Eliminar</button>
                            </form>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card-footer">
    {{ $posts->links() }}
</div>

{{-- Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Seguro que desea borrar el post selececionado?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <form id="formDelete" action="{{ route('admin.posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>  
            </div>
        </div>
    </div>
</div>