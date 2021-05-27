<div>
    <button wire:click="save" class="btn btn-success btn-sm float-right">Validar todo</button>

    @foreach ($post->comments as $comment)
        {{ $comment->status }}
    @endforeach
    
</div>
