<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {

        $users_id = auth ()
            ->user ()
            ->following ()
            ->pluck ('profiles.user_id');

        $users_id = $users_id->push (auth ()->user ()->id);

        $posts = Post::whereIn ('user_id', $users_id)->with ('user')->latest ()->paginate (10);

        return view ('posts.index', compact ('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store()
    {
        $data = request ()->validate
        ([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image']
        ]);

        $imagePath = request ('image')->store ('postPics', 'public');

        $image = Image::make (storage_path ('app/public/' . $imagePath))
            ->widen (600, function ($constraint) {
                $constraint->upsize ();
            });

        $image->save ();

        auth ()
            ->user ()
            ->posts ()
            ->create ([
                'caption' => $data['caption'],
                'image' => $imagePath
            ]);

        return redirect ('/profile/' . auth ()->user ()->profile->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show(Post $post)
    {
        $posts = $post->user->posts->except ($post->id);

        return view ('posts.show', compact ('post', 'posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Post $post)
    {
        $this->authorize ('delete', $post);

        $post->delete ();

        return Redirect::back();
    }

    public function likePost($id)
    {
        $post = Post::find ($id);
        $post->like ();
        $post->save ();

        return Redirect::back();
    }

    public function unlikePost($id)
    {
        $post = Post::find ($id);
        $post->unlike ();
        $post->save ();

        return Redirect::back();
    }
}
