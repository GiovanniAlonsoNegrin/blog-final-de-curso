<div class="relative w-full mb-3">   
    @if (Auth::guest())
        <p>Comentarios</p>
    @else

        <form action="#"></form>

            <label for="message" class="block uppercase text-gray-700 text-s font-bold mb-2 mt-2">Comentarios</label>
            <textarea wire:model.defer="message" name="message" id="message" cols="80" rows="4" required class="border-2 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full"></textarea>
            
            <input wire:model.defer="user_id" type="text" name="user_id" hidden>
            <input wire:model.defer="post_id" type="text" name="post_id" hidden>
            
            <button wire:click="save" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none mt-1">Comentar</button>
            
        </form>

    @endif
</div>
<div class="relative w-full mb-3">
    @forelse ($post->comments as $comment)

        @if (Auth::guest())
            @if ($comment->status == 2)
                <small>{{ $comment->user->name }} {{ $comment->created_at->format('d-m-Y H:i:s') }}</small>
                {!! Form::textarea('message', $comment->message, ['class' => 'border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full', 'placeholder' => 'Tu comentario...', 'maxlength' => '300', 'rows' => '4', 'cols' => '80', 'required', 'readonly']) !!}
                @forelse ($answers as $answer)
                    @if ($answer->comment_id == $comment->id)
                        {{-- {{ dd($answer->message) }} --}}
                        <div>
                            <small> {{ $answer->message }} </small>
                        </div>
                    @endif
                @empty
                    <small>No hay respuestas para este comentario</small>
                @endforelse

            @endif
        @else
            @if ($comment->status == 1 AND $comment->user_id == auth()->user()->id)
                <small>{{ $comment->user->name }} {{ $comment->created_at->format('d-m-Y H:i:s') }}</small>
                <div class="comentarioPost">
                    <small class="text-red-500 messageComment">Pendiente de moderaci??n</small> 
                    <div class="accionesPost">
                        @livewire('comment-edit', ['comment' => $comment], key($comment->id))
                        <form action="{{ route('post.comment.destroy', $comment) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="fas fa-trash-alt text-red-500"></button>
                        
                        </form>
                        
                    </div>
                
                    <textarea name="message" id="message" cols="80" rows="4" class="border-2 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full', 'placeholder' => 'Tu comentario...', 'maxlength' => '300', 'rows' => '4', 'cols' => '80', 'required', 'readonly">{{ $comment->message }}</textarea>
                </div>
            @endif
            @if ($comment->status == 2 AND $comment->user_id != auth()->user()->id)
                <small>{{ $comment->user->name }} {{ $comment->created_at->format('d-m-Y H:i:s') }}</small> 
                <div class="comentarioPost">
                    
                    <div class="accionsComment">
                        {{-- <small class="text-blue-500 answerComment">Responder</small> --}}
                        @livewire('comment-answer', ['comment' => $comment], key($comment->id))
                
                    </div>

                    {!! Form::textarea('message', $comment->message, ['class' => 'border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full', 'placeholder' => 'Tu comentario...', 'maxlength' => '300', 'rows' => '4', 'cols' => '80', 'required', 'readonly']) !!}

                </div>
                <div>

                    @forelse ($answers as $answer)
                        @if ($answer->comment_id == $comment->id)
                            <div class ='mt-2 ml-10 border-0 px-3 py-3 bg-blue-200 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-max h-max'>
                                <small>{{ $answer->user->name}} {{ $answer->created_at->format('d-m-Y H:i:s') }}</small> 
                                
                                <div class ='mt-2 ml-1 border-0 px-3 py-3 bg-gray-200 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full'>
                                    <p> {{ $answer->message }} </p>
                                </div>
                            </div>
                        @endif
                    @empty
                        <small>No hay respuestas para este comentario</small>
                    @endforelse

                    
                </div>
            @endif
            @if ($comment->status == 2 AND $comment->user_id == auth()->user()->id)
                <small>
                    <p class="inline-block">{{ $comment->user->name }} {{ $comment->created_at->format('d-m-Y H:i:s') }}</p> 
                </small>

                <div class="comentarioPost">
                    <div class="accionesPost">
                        @livewire('comment-edit', ['comment' => $comment], key($comment->id))
                        <form action="{{ route('post.comment.destroy', $comment) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="fas fa-trash-alt text-red-500"></button>
                        
                        </form>
                        
                    </div>
                
                    <textarea name="message" id="message" cols="80" rows="4" required readonly class="border-2 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full">{{ $comment->message }}</textarea>
                </div>
                @forelse ($answers as $answer)
                    @if ($answer->comment_id == $comment->id)
                        {{-- {{ dd($answer->message) }} --}}
                        <div class="comentarioPost">
                            <small> {{ $answer->message }} </small>
                        </div>
                    @endif
                @empty
                    <small>No hay respuestas para este comentario</small>
                @endforelse
            @endif
        @endif
    @empty
        <p>No existen comentarios para este post.</p>
    @endforelse
</div>

