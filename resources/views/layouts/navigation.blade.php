<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                    
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('posts')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('posts')" :active="request()->routeIs('dashboard')">
                        Mi Perfil
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('create')" :active="request()->routeIs('dashboard')">
                        Subir Imagen
                    </x-nav-link>
                </div>
            </div>
            

            <!-- Settings -->
            
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div style="border-radius:900px;overflow:hidden;width:50px;height:50px;margin:7px 5px 0px 0px;;background-color:gainsboro">
                @include('includes.avatar')
                </div>
                        <div>{{ Auth::user()->name }}</div>
                        <!-- Authentication -->
                        <x-dropdown-link :href="route('config')">
                            <p>Config</p>
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
            </div>

        </div>
    </div>
</nav>
