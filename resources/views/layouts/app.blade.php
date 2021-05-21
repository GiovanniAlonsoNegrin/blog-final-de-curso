<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <style>
            body {
                background-image: url(https://www.teahub.io/photos/full/28-288489_fondos-de-pantalla-4k.jpg);
                background-size: 100vw;
                height: 100vh;
            }

            .myShadow {
            -webkit-box-shadow: 5px 5px 15px 5px #000000; 
            box-shadow: 5px 5px 15px 5px #000000;
            }

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

            .comentarioPost{
                position: relative;
            }
            .comentarioPost:hover .accionesPost{
                opacity: 1;
                pointer-events: initial;
            }
            .accionesPost{
                position: absolute;
                right: 0;
                top: 0;
                background: none;
                padding: 5px;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                pointer-events: none;
                transition: .3s all;
            }
            .accionesPost > *{
                margin: 0 5px;
            }

            .messageComment{
                position: absolute;
                right: 0;
                bottom: 0;
                background: none;
                padding: 5px;
                display: flex;
                align-items: center;
                justify-content: center;
                pointer-events: none;
            }

            .comentarioPost:hover .accionsComment{
                opacity: 1;
                pointer-events: initial;
            }

            .accionsComment{
                position: absolute;
                right: 0;
                bottom: 0;
                background: none;
                padding: 5px;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                pointer-events: none;
                transition: .3s all;
            }

            .accionsComment > *{
                margin: 0 5px;
            }
            .answerComment{
                cursor: pointer;
            }
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="https://kit.fontawesome.com/e6dfba9ce5.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script>
            window.onload = function () {
                //Stars points
                $('.fa-star').on('mouseover',function(event){
                    event.preventDefault();
                    let position = $(this).data('position');
                    for(let i=1; i <= position; i++){
                        $('#star'+i).removeClass('far');
                        $('#star'+i).addClass('fas');
                        $('#star'+i).click(function () { 
                            // $('#score').val(i);
                            // $('#form').submit();
                            switch (i) {
                                case 1:
                                    $('#score').val(1);
                                    $('#form').submit();
                                    $('#starsMsg').removeAttr("hidden");
                                    break;
                                case 2:
                                    $('#score').val(2.5);
                                    $('#form').submit();
                                    $('#starsMsg').removeAttr("hidden");
                                    break;
                                case 3:
                                    $('#score').val(3.5);
                                    $('#form').submit();
                                    $('#starsMsg').removeAttr("hidden");
                                    break;
                                case 4:
                                    $('#score').val(4.5);
                                    $('#form').submit();
                                    $('#starsMsg').removeAttr("hidden");
                                    break;
                                case 5:
                                    $('#score').val(7.5);
                                    $('#form').submit();
                                    $('#starsMsg').removeAttr("hidden");
                                    break;
                                case 6:
                                    $('#score').val(10);
                                    $('#form').submit();
                                    $('#starsMsg').removeAttr("hidden");
                                    break;
                            
                                default:
                                    break;
                            }
                        });
                    }
                });
                
                $('.fa-star').on('mouseout',function(){
                    let position = $(this).data('position');
                    for(let i=1; i <= position; i++){
                        $('#star'+i).removeClass('fas');
                        $('#star'+i).addClass('far');
                    }
                });
            };

        </script>
        <script>
            // Livewire.on('data-send'(CommentID, UserID) => {
            //         console.log('dentro');
            //     });
        </script>
        
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen">
            @livewire('navigation')

            @livewire('comment-edit')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
