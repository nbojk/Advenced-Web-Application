<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex flex-row">
                        <img src="{{ asset($user->profile->getProfileImage()) }}" class="rounded-full mr-4" width="100">
                        <h1 class="text-xl font-bold mt-8">{{ $user->name }}</h1>
                    </div>

                    <div class="my-2 ml-3">
                        <p class="italic"> {{ $user->profile->description }}</p>
                        <a href="{{ $user->profile->url }}" target="_blanc" class="underline text-blue-500 hover:text-blue-400">{{ $user->profile->url }}</a>
                    </div>

                    <div class="mb-4 mt-4 ml-3">
                    @can('update', $user->profile)
                        <a class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" href="/profile/{{$user->name}}/edit">
                            Edit Profile
                        </a>
                    @else
                        <form action="{{route("follow", ["user"=>$user->profile->id])}}" method="post">
                            @csrf
                            @if(!$user->profile->isFollowing())
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Follow</button>
                            @else
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Unfollow</button>
                            @endif
                        </form>
                    @endcan
                    </div>

                    <div class="flex flex-row mb-3 ml-3">
                        <div class="pr-5"><strong> {{ $postCount }} </strong> posts</div>
                        <div class="pr-5"><strong> {{ $followersCount }} </strong> followers</div>
                        <div><strong> {{ $followingCount }} </strong> following</div>
                    </div>

                    <hr/>

                    @foreach ($user->posts->chunk(3) as $three)

                    <section class="overflow-hidden text-gray-700 ">
                        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                            <div class="flex flex-wrap -m-1 md:-m-2">
                                @foreach($three as $post)
                                <div class="flex flex-wrap w-1/3">
                                    <div class="w-full p-1 md:p-2">
                                        <a href="{{ route('posts.show', $post->id) }}">
                                        <img class="block object-cover object-center w-full h-full rounded-lg"
                                             src="{{ asset("storage/$post->image") }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
