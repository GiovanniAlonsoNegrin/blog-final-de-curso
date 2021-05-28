<x-app-layout>

    <div class="container my-8 bg-gray-200 rounded-lg">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Categoría: {{ $category->name }}</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                
                @foreach ($posts as $post)
                    <x-card-post :post="$post" />  
                @endforeach

                <div class="mt-4">

                    
                    {{ $posts->links() }}
                </div>
            </div>
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Otras categorías</h1>  
                
                <ul>
                    @foreach ($categories as $category)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.category', $category) }}">
                                @if ($post->category == $category)
                                    <span class="ml-2 text-gray-600 text-4xl bg-blue-400 rounded-xl">{{ $category->name }}</span>
                                @else
                                    <span class="ml-2 text-gray-600 text-4xl hover:bg-blue-400 rounded-xl">{{ $category->name }}</span>
                                @endif
                                 
                            </a> 
                        </li> 
                    @endforeach
                </ul> 
                    
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Posts más vistos</h1>
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
            </aside>
        </div>
         
    </div>  

    <script src="https://kit.fontawesome.com/e6dfba9ce5.js" crossorigin="anonymous"></script>

</x-app-layout>