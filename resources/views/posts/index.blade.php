<x-app-layout>

    <style>

        /* .image{
            background-image: url(https://www.teahub.io/photos/full/28-288489_fondos-de-pantalla-4k.jpg);
            background-repeat: no-repeat;
            background-size: 100vw;
            height: 100vh;
        }  */
    
        .overlay::before{
            content: ''; 
            position: absolute; 
            background-color:#000; 
            opacity: 0.6; 
            top:0; 
            right:0; 
            left:0; 
            bottom:0; 
            border-radius: 7px;
        }   
    </style>

    <div class="image">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
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
                                        <i class="fas fa-star text-yellow-500"></i>
                                        <i class="far fa-star text-yellow-500"></i>
                                        <i class="far fa-star text-yellow-500"></i>
                                        <i class="far fa-star text-yellow-500"></i>
                                        <i class="far fa-star text-yellow-500"></i>
                                        <i class="far fa-star text-yellow-500"></i>
                                    </ul>
                                    <small class="text-white relative">{{ $post->created_at->format('d-m-Y') }}</small>
                                </div> 
                            </div>
                        </article>    
                    @endforeach
                </div>
            </div>

            <div class="container mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    
    <script src="https://kit.fontawesome.com/e6dfba9ce5.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        window.onload = function () {

            $('article').mouseover(function () { 
                $( this ).addClass( "overlay" ); 
            }); 

            $('article').mouseout(function () { 
                $( this ).removeClass( "overlay" );  
            });

        };
    </script>

</x-app-layout>
