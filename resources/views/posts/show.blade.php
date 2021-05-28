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
                        <i id="star1" data-position="1" class="far fa-star text-yellow-500 text-3xl"></i>
                        <i id="star2" data-position="2" class="far fa-star text-yellow-500 text-3xl"></i>
                        <i id="star3" data-position="3" class="far fa-star text-yellow-500 text-3xl"></i>
                        <i id="star4" data-position="4" class="far fa-star text-yellow-500 text-3xl"></i>
                        <i id="star5" data-position="5" class="far fa-star text-yellow-500 text-3xl"></i>
                        <i id="star6" data-position="6" class="far fa-star text-yellow-500 text-3xl"></i>
                    </ul>

                    {!! Form::open(['route' => 'post.comment.store', 'autocomplete' => 'off', 'files' => true]) !!}

                        {!! Form::hidden('point', '') !!}  

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
                    {{-- Visitor Counter --}}
                    <div class="border border-light-blue-300 shadow rounded-md  max-w-sm w-full mx-auto content-center"> 
                        <h1 class="text-center">Visitas  {{ $post->count}}</h1>       
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

    <div id="myModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
      
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      
          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
 
                <div class="mt-3 text-center sm:mt-0 sm:text-left">
                  <div class="mt-2">
                    @if (session('info')) 
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-1" role="alert">
                            <strong class="font-bold">{{ session('info') }}</strong>
                        </div>
                    @endif

                    {{-- {!! Form::model($comment, ['route' => ['post.comment.update', $comment], 'method' => 'put']) !!}
                        
                            {!! Form::label('message','Comentario', ['class' => 'block text-m font-semibold  text-gray-700']) !!}
                            {!! Form::textarea('message', null, ['class' => 'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md', 'rows' => '3' , 'required']) !!}
    
                            @error('message')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
    
                        {!! Form::submit('Actualizar comentario', ['class' => 'inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-800 focus:outline-none mt-1']) !!}
    
                        <button id="myButtonClose" type="button" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-red-500 rounded shadow ripple hover:shadow-lg hover:bg-red-800 focus:outline-none mt-1">
                            Cancelar
                        </button>
    
                    {!! Form::close() !!} --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              
            </div>
          </div>
        </div>
       </div>

</x-app-layout>