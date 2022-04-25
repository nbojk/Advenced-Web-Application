<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <main class="grid place-items-center">
                        <section class="bg-white p-8 rounded max-w-md mx-auto border">
                            <form action="/post" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="caption"
                                           class="form-label
                                            inline-block
                                            text-gray-700
                                            font-bold"
                                    >Caption
                                    </label>

                                    <textarea type="caption"
                                              id="caption"
                                              name="caption"
                                              autocomplete="caption"
                                              cols="50"
                                              rows="5"
                                              placeholder="Write a caption..."
                                              class="form-control
                                              block w-full
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
                                    </textarea>
                                </div>

                                <div class="flex justify-center">
                                    <div class="mb-3 w-96">

                                        <label for="image"
                                               class="form-label inline-block text-gray-700 font-bold">Photo</label>

                                        <input type="file"
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
                                               name="image"
                                               id="image">
                                    </div>
                                </div>
                                <div>
                                    <x-button type="submit">
                                        Share
                                    </x-button>
                                </div>
                            </form>
                        </section>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
