@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)
        <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($post->image->url) }}" alt="">
    @else
        <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2015/04/20/13/17/work-731198_1280.jpg" alt="">
    @endif

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
            <small>{{ $post->created_at->format('d-m-Y, H:i:s') }}</small>
        </h1>

        <ul>
            <i class="fas fa-star text-yellow-500 text-3xl"></i>
            <i class="far fa-star text-yellow-500 text-3xl"></i>
            <i class="far fa-star text-yellow-500 text-3xl"></i>
            <i class="far fa-star text-yellow-500 text-3xl"></i>
            <i class="far fa-star text-yellow-500 text-3xl"></i>
            <i class="far fa-star text-yellow-500 text-3xl"></i>
        </ul>

        <div class="text-gray-700 text-base">
            {!! $post->extract !!}
        </div>
    </div>

    <div class="px-6 pt-4 pb-2">
        @foreach ($post->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}" class="inline-block bg-{{ $tag->color }}-600 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{ $tag->name }}</a>
        @endforeach
    </div>
    <script src="https://kit.fontawesome.com/e6dfba9ce5.js" crossorigin="anonymous"></script>
</article>