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

                        {!! Form::model(['method' => 'put']) !!}
                        {{-- {!! Form::model($comment, ['route' => ['post.comment.update', $comment], 'method' => 'put']) !!} --}}
                            
                                {!! Form::label('message','Comentario', ['class' => 'block text-m font-semibold  text-gray-700']) !!}
                                {!! Form::textarea('message', null, ['class' => 'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md', 'rows' => '3' , 'required']) !!}
        
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
        
                            {!! Form::submit('Actualizar comentario', ['class' => 'inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-800 focus:outline-none mt-1']) !!}
        
                            <button id="myButtonClose" type="button" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-red-500 rounded shadow ripple hover:shadow-lg hover:bg-red-800 focus:outline-none mt-1">
                                Cancelar
                            </button>
        
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            
        </div>
        </div>
    </div>
</div>

