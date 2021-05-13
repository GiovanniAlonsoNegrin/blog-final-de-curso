<x-app-layout>

    <div class="container my-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Etiqueta: {{ $tag->name }}</h1>
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
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Otras etiquetas</h1>
                
                <ul>
                    @foreach ($tags as $myTag)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.tag', $myTag) }}">
                                @if ($myTag == $tag )
                                    <span class="ml-2 text-gray-600 text-4xl bg-{{ $myTag->color }}-300 rounded-xl">{{ $myTag->name }}</span>
                                @else
                                    <span class="ml-2 text-gray-600 text-4xl hover:bg-{{ $myTag->color }}-300 rounded-xl">{{ $myTag->name }}</span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
    
</x-app-layout>