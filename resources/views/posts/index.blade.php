<x-app-layout>

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 bg-gray-200 rounded-lg mt-10 border-8">
        <div class="container py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <article class="w-full relative h-80 bg-cover bg-center rounded-lg @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{ Storage::url($post->image->url) }} @else https://cdn.pixabay.com/photo/2015/04/20/13/17/work-731198_1280.jpg @endif)">
                        <div class="w-full h-full px-8 flex flex-col justify-center">
                            <div>
                                @foreach ($post->tags as $tag)
                                    <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full relative">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                            <div>
                                <h1 class="text-4xl text-white leading-8 font-bold mt-2 relative">
                                    <a href="{{ route('posts.show', $post) }}">
                                        {{ $post->name }}
                                    </a>
                                </h1>
                                <ul class="relative">

                                    @for ($i = 1; $i <= 6; $i++)
                                        @php
                                            $result = round($points[$post->id]*6/10)
                                        @endphp
                                        @if ($i <= $result)   
                                            <i id="indexStar{{ $i }}" class="fas fa-star text-yellow-500"></i>
                                        @else
                                            <i id="indexStar{{ $i }}" class="far fa-star text-yellow-500"></i>
                                        @endif   
                                    @endfor
                                    
                                </ul>
                                <small class="text-white relative">{{ $post->created_at->format('d-m-Y') }}</small>
                            </div> 
                        </div>
                    </article>    
                @endforeach
            </div>
        </div>

        <div class="container mt-4 pb-2">
            {{ $posts->links() }}
        </div>
    </div>

    <script>
        window.onload = function () {

            $('article').mouseover(function () { 
                $( this ).addClass( "overlay" ); 
                $( this ).addClass( "myShadow" ); 
            }); 

            $('article').mouseout(function () { 
                $( this ).removeClass( "overlay" );  
                $( this ).removeClass( "myShadow" );  
            });

        };
    </script> 
</x-app-layout>
