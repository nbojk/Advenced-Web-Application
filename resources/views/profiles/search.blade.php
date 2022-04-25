<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(isset($details))
                    <h1>Results for: <p class="font-bold inline-block">{{ $query }}</p></h1>

                    @foreach($details as $user)
                    <div class="flex flex row border border-solid mt-3 px-3 py-3">
                        <a href="/profile/{{$user->profile->id}}" class="w-20 h-20">
                            <img src="{{ asset($user->profile->getProfileImage()) }}" class="rounded-full">
                        </a>
                        <div class="place-items-center ml-4">
                            <a href="/profile/{{$user->profile->id}}">
                                <p class="font-bold mt-7">{{ $user->name }}</p>
                            </a>
                        </div>


                    </div>
                    @endforeach

                    @else
                    <p>No results for your search</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


