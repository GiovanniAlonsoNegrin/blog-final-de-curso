<x-app-layout>
    
    <div class="container my-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>
        
        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2015/04/20/13/17/work-731198_1280.jpg" alt=""> 
                    @endif
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    <ul>
                        <i class="fas fa-star text-yellow-500 text-3xl"></i>
                        <i class="far fa-star text-yellow-500 text-3xl"></i>
                        <i class="far fa-star text-yellow-500 text-3xl"></i>
                        <i class="far fa-star text-yellow-500 text-3xl"></i>
                        <i class="far fa-star text-yellow-500 text-3xl"></i>
                        <i class="far fa-star text-yellow-500 text-3xl"></i>
                    </ul>
                    {!! $post->body !!}
                </div>
            </div>
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>
                
                <ul>
                    @foreach ($similars as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center flex-none" src="{{ Storage::url($similar->image->url) }}" alt="image">
                                @else
                                    <img class="w-36 h-20 object-cover object-center flex-none" src="https://cdn.pixabay.com/photo/2015/04/20/13/17/work-731198_1280.jpg" alt="image">
                                @endif
                                <span class="ml-2 text-gray-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/e6dfba9ce5.js" crossorigin="anonymous"></script>

</x-app-layout>