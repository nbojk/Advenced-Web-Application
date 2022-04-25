<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <main class="grid place-items-center">
                        <section class="bg-white p-8 rounded border">

                            @forelse ($posts as $post)
                            <!-- Header -->
                            <div class="border rounded">
                                <div class="max-w-7xl mx-auto px-1 sm:px-1 lg:px-2">
                                    <div class="flex justify-between h-16">
                                        <div class="flex">
                                            <div class="shrink-0 flex items-center">
                                                <a href="/profile/{{$post->user->id}}"class="ml-3 w-10 h-10">
                                                <img src="{{ asset($post->user->profile->getProfileImage()) }}" class="rounded-full">
                                                </a>
                                                <a href="/profile/{{$post->user->id}}" class="ml-3">
                                                    {{ $post->user->name }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="hidden sm:flex sm:items-center">
                                            <x-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                                                        <div class="ml-1">
                                                            <svg class="fill-current h-4 w-4"
                                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                      clip-rule="evenodd"/>
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </x-slot>

                                                <x-slot name="content">
                                                    <x-dropdown-link href="{{ route('posts.show', $post->id) }}">
                                                        {{ __('Go to Post') }}
                                                    </x-dropdown-link>

                                                    @can('delete', $post)
                                                        <form action="{{ route('posts.destroy', $post->id) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <x-dropdown-link onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                                            class="text-red-600"
                                                            >
                                                                {{ __('Delete') }}
                                                            </x-dropdown-link>
                                                        </form>
                                                    @endcan
                                                </x-slot>
                                            </x-dropdown>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="grid place-items-center py-3 px-3">
                                    <img src="{{ asset("storage/$post->image") }}" alt="image"
                                         class="object-cover rounded max-w-md">
                                </div>

                                <!-- Footer -->
                                <div class=" px-3">

                                    @if(!$post->liked())


                                    <form action="{{ route('like.post', $post->id) }}"
                                          method="post"
                                    >
                                        @csrf
                                        <button
                                        >
                                            <i class="fa-regular fa-heart text-xl"></i>
                                        </button>
                                    </form>

                                    @else

                                    <form action="{{ route('unlike.post', $post->id) }}"
                                          method="post"
                                    >
                                        @csrf
                                        <button
                                        >
                                            <i class="fa-solid fa-heart text-xl" style="color: red;"></i>
                                        </button>
                                    </form>
                                    @endif

                                    <p class="font-bold">{{ $post->likeCount }} likes</p>


                                    <div class="flex-row">
                                        <div class="mt-1 mb-1">
                                            <a href="/profile/{{$post->user->id}}"
                                               class="font-bold">
                                                {{ $post->user->name }}
                                            </a>
                                            {{ $post->caption }}
                                        </div>

                                        <a href="{{ route('posts.show', $post->id) }}"
                                           class="text-gray-400"
                                        >View Comments
                                        </a>

                                        <p class="text-gray-400 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>

                            @empty
                            <div class="grid place-items-center py-3 px-3">
                                <img src="{{ asset("img/nopostsyet.png") }}" alt="image" class="object-cover rounded">
                            </div>
                            @endforelse
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
