<div>
    <button wire:click="save" id="button" class="btn btn-success btn-sm float-right">Validar todo</button>  

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.onload = function () {
            $('#button').click(function () { 
                Swal.fire({
                    icon: 'success',
                    title: 'Genial!',
                    text: 'Los comentarios se validaron con éxito',
                    confirmButtonText: 'ok'
                }).then( function(){
                    window.location.reload();
                });
            }); 
        };
    </script> 
</div>
