<div>
    <a wire:click="$set('open', true)">
        <i class="fas fa-edit text-green-500 cursor-pointer"></i>
    </a>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name='title'>
            Editar comentario
        </x-slot>

        <x-slot name='content'>
            <div class="mb-4">
                <textarea wire:model="comment.message" class="border-2 px-3 py-3 bg-gray-300 placeholder-black text-gray-800 rounded text-sm shadow focus:outline-none w-full h-full" rows="6"></textarea>
            </div>
        </x-slot>

        <x-slot name='footer'>
            {{-- <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button> --}}

            <button wire:click="$set('open', false)" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-red-500 rounded shadow ripple hover:shadow-lg hover:bg-red-600 focus:outline-none mt-1">
                Cancelar
            </button>

            {{-- <x-jet-danger-button wire:click="save">
                Actualizar
            </x-jet-danger-button> --}}
            <button wire:click="save" wire:loading.attr="disabled" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none mt-1 disabled:opacity-25">
                Actualizar
            </button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
