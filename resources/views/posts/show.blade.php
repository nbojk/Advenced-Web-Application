<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <main class="grid place-items-center">
                        <section class="bg-white p-8 rounded border">

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
                                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                                            <x-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button class="flex
                                                                   items-center
                                                                    text-sm
                                                                    font-medium
                                                                    text-gray-500
                                                                    hover:text-gray-700
                                                                    hover:border-gray-300
                                                                    focus:outline-none
                                                                    focus:text-gray-700
                                                                    focus:border-gray-300
                                                                    transition
                                                                    duration-150
                                                                    ease-in-out">

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
                                <div class="py-3 px-3">

                                    @if(!$post->liked())


                                    <form action="{{ route('like.post', $post->id) }}"
                                          method="post"
                                          class="mt-1"
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
                                          class="mt-1"
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

                                        <p class="text-gray-400 text-sm mb-1">{{ $post->created_at->diffForHumans() }}</p>

                                        <hr/>

                                        <div class="grid place-items-center mb-3 mt-2">
                                            <h1 class="font-bold text-xl">Comments</h1>
                                        </div>

                                        @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
                                        <form method="post" action="{{ route('comments.store') }}">
                                            @csrf
                                            <div class="mt-2">
                                                    <textarea class="form-control
                                                                     block
                                                                     w-full
                                                                     px-3
                                                                     py-1.5
                                                                     text-base
                                                                     font-normal
                                                                     text-gray-700
                                                                     bg-white bg-clip-padding
                                                                     border border-solid border-gray-300
                                                                     rounded
                                                                     transition
                                                                     ease-in-out
                                                                     m-0
                                                                     focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                              name="body"
                                                    >
                                                    </textarea>
                                                <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                                            </div>
                                            <div class="mt-2 mb-2 grid place-items-center">
                                                <button type="submit" class="bg-white
                                                                             hover:bg-gray-100
                                                                             text-gray-800
                                                                             font-semibold
                                                                             py-2
                                                                             px-4
                                                                             border
                                                                             border-gray-400
                                                                             rounded
                                                                             shadow
                                                                             ease-in-out"
                                                >
                                                    Add Comment
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
