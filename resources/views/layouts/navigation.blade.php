<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('posts.index') }}">
                        <x-application-logo2 />
                    </a>
                </div>

            </div>

            <form action="/search" method="POST" class="m-auto">
                @csrf
                <div class="flex flex-row">
                    <input class="bg-gray-50
                                  mr-2
                                  border
                                  border-gray-300
                                  text-gray-900
                                  text-sm
                                  rounded-lg
                                  focus:ring-blue-500
                                  focus:border-blue-500
                                  block
                                  w-full
                                  p-2.5"
                           name="q"
                           placeholder="Search...">
                    <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-lg shadow"><i class="fa fa-search"></i></button>
                </div>
            </form>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div><img src="{{ Auth::user()->profile->getProfileImage() }}" alt="Profile Image" class="rounded-full w-10 h-10"></div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link href="/profile/{{Auth::user()->profile->id}}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link href="/posts/create">
                            {{ __('Add New Post') }}
                        </x-dropdown-link>

                        <x-dropdown-link href="/explore">
                            {{ __('More Users') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                             class="text-red-600"
                            >
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
