<x-app-layout>

    <div class="container my-8 bg-gray-100 h-full py-4 px-4 rounded-lg">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>
        
        <div class="text-lg text-gray-500 mb-2 text-justify">
            {!! $post->extract !!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center rounded-lg" src="{{ Storage::url($post->image->url) }}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center rounded-lg" src="https://cdn.pixabay.com/photo/2015/04/20/13/17/work-731198_1280.jpg" alt=""> 
                    @endif
                </figure>
                <small>{{ $post->created_at->format('d-m-Y, H:i:s') }}</small>
                <div class="text-base text-gray-500 mt-4">
                    <ul>
                        @for ($i = 1; $i <= 6; $i++)
                            <i id="star{{ $i }}" data-position="{{ $i }}" class="far fa-star text-yellow-500 text-3xl"></i>
                        @endfor
                    </ul>

                    {!! Form::open(['route' => 'post.point.store', 'autocomplete' => 'off', 'files' => true, 'id' => 'form']) !!}

                        {!! Form::hidden('score', '', ['id' => 'score']) !!}
                        {!! Form::hidden('post_id', $post->id) !!}

                    {!! Form::close() !!}

                    <div class="text-justify">
                        {!! $post->body !!}
                    </div>
                </div>
                <div class="relative w-full mb-3">   
                    @if (Auth::guest())
                        <p>Comentarios</p>
                    @else
                        {{-- Laravel collective --}}
                        {!! Form::open(['route' => 'post.comment.store', 'autocomplete' => 'off', 'files' => true]) !!}

                            {!! Form::label('message', 'Comentarios', ['class' => 'block uppercase text-gray-700 text-s font-bold mb-2 mt-2']) !!}
                            
                            {!! Form::textarea('message', '', ['class' => 'border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full', 'placeholder' => 'Tu comentario...', 'maxlength' => '300', 'rows' => '4', 'cols' => '80', 'required']) !!}
                            
                            {!! Form::hidden('user_id', auth()->user()->id) !!}
                            {!! Form::hidden('post_id', $post->id) !!}

                            {!! Form::submit('Comentar', ['class' => 'inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none mt-1']) !!}

                        {!! Form::close() !!}

                    @endif
                </div>
                <div class="relative w-full mb-3">
                    @forelse ($post->comments as $comment)

                        @if (Auth::guest())
                            @if ($comment->status == 2)
                            <small>{{ $comment->user->name }} {{ $comment->created_at->format('d-m-Y H:i:s') }}</small>
                            {!! Form::textarea('message', $comment->message, ['class' => 'border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full', 'placeholder' => 'Tu comentario...', 'maxlength' => '300', 'rows' => '4', 'cols' => '80', 'required', 'readonly']) !!}
                        @endif
                        @else
                            @if ($comment->status == 1 AND $comment->user_id == auth()->user()->id)
                                <small>{{ $comment->user->name }} {{ $comment->created_at->format('d-m-Y H:i:s') }}</small>
                                <div class="comentarioPost">
                                    <small class="text-red-500 messageComment">Pendiente de moderación</small> 
                                    <div class="accionesPost">
                                        {{-- <a id="myButtonOpen" class="fas fa-edit text-green-500" href="{{ route('post.comment.edit', $comment) }}"></a> --}}
                                        {{-- <a id="myButtonOpen" class="fas fa-edit text-green-500" href="{{ $comment }}"></a> --}}
                                        <button id="myButtonOpen" class="fas fa-edit text-green-500"></button>
                                        <form action="{{ route('post.comment.destroy', $comment) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="fas fa-trash-alt text-red-500"></button>
                                        
                                        </form>
                                        
                                    </div>
                                
                                    <textarea name="message" id="message" cols="80" rows="4" class="border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full', 'placeholder' => 'Tu comentario...', 'maxlength' => '300', 'rows' => '4', 'cols' => '80', 'required', 'readonly">{{ $comment->message }}</textarea>
                                </div>
                            @endif
                            @if ($comment->status == 2 AND $comment->user_id != auth()->user()->id)
                                <small>{{ $comment->user->name }} {{ $comment->created_at->format('d-m-Y H:i:s') }}</small>
                                {!! Form::textarea('message', $comment->message, ['class' => 'border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full', 'placeholder' => 'Tu comentario...', 'maxlength' => '300', 'rows' => '4', 'cols' => '80', 'required', 'readonly']) !!}
                            @endif
                            @if ($comment->status == 2 AND $comment->user_id == auth()->user()->id)
                                <small>
                                    <p class="inline-block">{{ $comment->user->name }} {{ $comment->created_at->format('d-m-Y H:i:s') }}</p> 
                                </small>
    
                                <div class="comentarioPost">
                                    <div class="accionesPost">
                                        {{-- <a id="myButtonOpen" class="fas fa-edit text-green-500" href="{{ route('post.comment.edit', $comment) }}"></a> --}}
                                        {{-- <a id="myButtonOpen" class="fas fa-edit text-green-500" href="{{ $comment }}"></a> --}}
                                        <button id="myButtonOpen" class="fas fa-edit text-green-500"></button>
                                        <form action="{{ route('post.comment.destroy', $comment) }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="fas fa-trash-alt text-red-500"></button>
                                        
                                        </form>
                                        
                                    </div>
                                
                                    <textarea name="message" id="message" cols="80" rows="4" class="border-0 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full', 'placeholder' => 'Tu comentario...', 'maxlength' => '300', 'rows' => '4', 'cols' => '80', 'required', 'readonly">{{ $comment->message }}</textarea>
                                </div>
                            @endif
                        @endif
                    @empty
                        <p>No existen comentarios para este post.</p>
                    @endforelse
                </div>
            </div>
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>
                
                <ul>
                    @foreach ($similars as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center flex-none rounded-lg" src="{{ Storage::url($similar->image->url) }}" alt="image">
                                @else
                                    <img class="w-36 h-20 object-cover object-center flex-none rounded-lg" src="https://cdn.pixabay.com/photo/2015/04/20/13/17/work-731198_1280.jpg" alt="image">
                                @endif
                                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>

</x-app-layout>