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
                    @if (Auth::user())   
                        <div class="mb-5 text-center">
                            <h2>¡¡Puntuame!!</h2>
                            <ul>
                                @for ($i = 1; $i <= 6; $i++)
                                    <i id="star{{ $i }}" data-position="{{ $i }}" class="far fa-star text-yellow-500 text-3xl"></i>
                                @endfor                     
                            </ul>
                            <h1 id="starsMsg" hidden>Gracias por puntuarme</h1>
                        </div>

                        {!! Form::open(['route' => 'post.point.store', 'autocomplete' => 'off', 'files' => true, 'id' => 'form']) !!}

                        {!! Form::hidden('point', '') !!}  
                            {!! Form::hidden('score', '', ['id' => 'score']) !!}
                            {!! Form::hidden('post_id', $post->id) !!}

                        {!! Form::close() !!}
                    @endif

                    <div class="text-justify"> 
                        {!! $post->body !!}
                    </div>
                </div>
                @livewire('comments', ['post' => $post])
                

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
                    {{-- Visitor Counter --}}
                    <div class="border border-light-blue-300 shadow rounded-md  max-w-sm w-full mx-auto content-center"> 
                        <h1 class="text-center">Visitas  {{ $post->count}}</h1>       
                    </div>       
            </div>    
                {{ $post->count }}
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

                <h1 class="text-2xl font-bold text-gray-600 mb-4">Post más vistos</h1>
                

                <ul>
                    @foreach ( $maxviews as $maxviewpost)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $maxviewpost) }}">
                                @if ($maxviewpost->image)
                                    <img class="w-36 h-20 object-cover object-center flex-none rounded-lg" src="{{ Storage::url($maxviewpost->image->url) }}" alt="image">
                                @else
                                    <img class="w-36 h-20 object-cover object-center flex-none rounded-lg" src="https://cdn.pixabay.com/photo/2015/04/20/13/17/work-731198_1280.jpg" alt="image">
                                @endif
                                <span class="ml-2 text-gray-600">{{ $maxviewpost->name }}</span> 
                            </a>
                        </li>  
                    @endforeach 
                </ul>

                <a href="{{ route('posts.maxviews') }}">Ver todos los posts más vistos</a>
            </aside>
        </div> 
    </div>

</x-app-layout>