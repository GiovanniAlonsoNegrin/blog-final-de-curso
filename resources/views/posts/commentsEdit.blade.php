<x-app-layout>
    <div class="container">
        @if (session('info')) 
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-1" role="alert">
                <strong class="font-bold">{{ session('info') }}</strong>
            </div>
        @endif
        {{-- Laravel collective --}}
        {!! Form::model($comment, ['route' => ['post.comment.update', $comment], 'method' => 'put']) !!}
            
                {!! Form::label('message','Comentario', ['class' => 'block text-m font-semibold  text-gray-700']) !!}
                {!! Form::textarea('message', null, ['class' => 'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md', 'rows' => '3' , 'required']) !!}

                @error('message')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            {!! Form::submit('Actualizar comentario', ['class' => 'inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-700 rounded shadow ripple hover:shadow-lg hover:bg-green-800 focus:outline-none mt-1']) !!}

        {!! Form::close() !!}
    </div>
</x-app-layout>



