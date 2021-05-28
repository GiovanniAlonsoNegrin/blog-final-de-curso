<x-app-layout>
    <div class="container my-8 bg-gray-200 rounded-lg">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Posts más comentados</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                
                @foreach ($posts as $post)
                    <x-card-post :post="$post" />  
                @endforeach

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>    
 