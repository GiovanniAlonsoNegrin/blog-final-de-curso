<nav x-data="{ open: false }" class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- Mobile menu button-->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            
                <button x-on:click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                    Icon when menu is closed.
        
                    Heroicon name: outline/menu
        
                    Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                    Icon when menu is open.
        
                    Heroicon name: outline/x 
        
                    Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

                {{-- Logo --}}
                <a href="/" class="flex-shrink-0 flex items-center">
<<<<<<< HEAD
                    <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                    <img class="h-14 w-auto mr-2"  src="data:image/jpeg;base64,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" alt="full_games">
                    <h1 class="text-white
                    
                     text-lg text-bold">FULL GAME</h1>
                    {{-- <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow"> --}}
=======
                    <img class="block lg:hidden h-12 w-auto" src="{{ url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Video-Game-Controller-Icon.svg/1024px-Video-Game-Controller-Icon.svg.png') }}" alt="FullGames">
                    <img class="hidden lg:block h-11 w-auto" src="{{ url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Video-Game-Controller-Icon.svg/1024px-Video-Game-Controller-Icon.svg.png') }}" alt="FullGames">
                    <h1 class="hidden lg:block ml-1 text-white text-lg font-semibold">Full Games</h1>
>>>>>>> fc78c0ee2c53c495751054c6e28b0492d381c2f6
                </a>
 
                {{-- Nav menu --}}
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    {{-- <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a> --}}

                    @foreach ($categories as $category)
                        <a href="{{ route('posts.category', $category) }}" class="hidden lg:block mt-1 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ $category->name }}</a>
                    @endforeach
                    </div>
                </div>
            </div>
            @auth
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    {{-- Notifications button --}}
                    <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
            
                    <!-- Profile dropdown -->
                    <div class="ml-3 relative" x-data="{ open: false }">
                        <div>
                        <button x-on:click="open = true" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                        </button>
                        </div>
            
                        <!--
                        Dropdown menu, show/hide based on menu state.
            
                        Entering: "transition ease-out duration-100" 
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                        Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
                            @can('admin.home')
                                <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                            @endcan
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault(); this.closest('form').submit();">Cerrar sesión</a>
                            </form>    
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Registro</a>
            @endauth
        </div>
    </div> 
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="open" x-on:click.away="open = false" class="sm:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        {{-- <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a> --}}
        
        @foreach ($categories as $category)
            <a href="{{ route('posts.category', $category) }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ $category->name }}</a>
        @endforeach
      </div>
    </div>
</nav>
   