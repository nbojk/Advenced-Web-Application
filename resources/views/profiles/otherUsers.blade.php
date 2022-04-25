<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($users as $user)
                        <main class="grid place-items-center mb-2">
                            <section class="bg-white p-4 rounded max-w-md mx-auto border">
                                <a href="/profile/{{$user->profile->id}}">
                                    <img src="{{ asset($user->profile->getProfileImage()) }}" class="rounded-full">
                                </a>
                                <div class="grid place-items-center mt-2">
                                    <a href="/profile/{{$user->profile->id}}">
                                        {{$user->name}}
                                    </a>
                                </div>
                            </section>
                        </main>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
