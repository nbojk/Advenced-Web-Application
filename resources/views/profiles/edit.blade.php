<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <main class="grid place-items-center">
                        <section class="bg-white p-8 rounded max-w-md mx-auto border">
                            <div class="">
                                <form method="POST"
                                      action="/profile/{{ $user->profile->id }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <div class="mb-6">
                                        <label for="name"
                                               class="block mb-2 text-sm font-medium text-gray-900">
                                            {{ __('Name') }}
                                        </label>
                                        <input type="text"
                                               id="name"
                                               name="name"
                                               class="bg-gray-50
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
                                               required
                                               value="{{ old('name') ?? $user->name }}"
                                               autofocus
                                        >
                                    </div>

                                    <div class="mb-6">
                                        <label for="url"
                                               class="block mb-2 text-sm font-medium text-gray-900">
                                            {{ __('URL') }}
                                        </label>
                                        <input type="text"
                                               id="url"
                                               name="url"
                                               class="bg-gray-50
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
                                               value="{{ old('url') ?? $user->profile->url }}"
                                        >
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="description"
                                            class="block
                                                   mb-2
                                                   text-sm
                                                   font-medium
                                                   text-gray-900"
                                        >
                                            {{ __('Description') }}
                                        </label>

                                        <input type="text"
                                               id="description"
                                               name="description"
                                               class="bg-gray-50
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
                                               value="{{ old('description') ?? $user->profile->description }}"
                                        >

                                    </div>

                                    <div class="mb-6">
                                        <label for="email"
                                               class="block mb-2 text-sm font-medium text-gray-900">
                                            {{ __('Email') }}
                                        </label>
                                        <input type="email"
                                               id="email"
                                               name="email"
                                               class="bg-gray-50
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
                                               value="{{ old('name') ?? $user->email }}"
                                               required
                                        >
                                    </div>

                                    <div class="flex justify-center">
                                        <div class="mb-3 w-96">
                                            <label for="image"
                                                   class="block mb-2 text-sm font-medium text-gray-900">
                                                Profile Photo
                                            </label>

                                            <input
                                                type="file"
                                                name="image"
                                                id="image"
                                                class="form-control
                                                       block
                                                       w-full
                                                       px-3
                                                       py-1.5
                                                       text-base
                                                       font-normal
                                                       text-gray-700
                                                       bg-white
                                                       bg-clip-padding
                                                       border
                                                       border-solid
                                                       border-gray-300
                                                       rounded
                                                       transition
                                                       ease-in-out
                                                       m-0
                                                       focus:text-gray-700
                                                       focus:bg-white
                                                       focus:border-blue-600
                                                       focus:outline-none"
                                            >
                                        </div>
                                    </div>
                                    <div>
                                        <x-button type="submit">
                                            Update
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
