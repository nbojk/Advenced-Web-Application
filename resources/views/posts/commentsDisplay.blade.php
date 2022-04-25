@foreach($comments as $comment)
    <div @if($comment->parent_id != null) style="margin-left:40px;" @endif class="mt-2">
        <p class="font-bold">{{ $comment->user->name }}</p>
        <p>{{ $comment->body }}</p>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="mt-1">
                <input type="text"
                       name="body"
                       class="block
                              p-2
                              text-gray-900
                              bg-gray-50
                              rounded
                              border
                              border-gray-300
                              sm:text-xs
                              focus:ring-blue-500
                              focus:border-blue-500"
                />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="mt-2 mb-2">
                <input type="submit"
                       class="bg-white
                              hover:bg-gray-100
                              text-gray-800
                              py-2
                              px-2
                              border
                              border-gray-400
                              rounded
                              shadow
                              ease-in-out"
                       value="Reply" />
            </div>
            <hr />
        </form>
        @include('posts.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
