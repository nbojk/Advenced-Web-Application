<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(3),
            function () use ($user) {
                return $user->posts->count();
            }
        );

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(2),
            function () use ($user) {
                return $user->profile->followers->count();
            }
        );

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(2),
            function () use ($user) {
                return $user->following->count();
            }
        );

        return view('profiles.index', compact('user', 'postCount', 'followersCount', 'followingCount' ));
    }

    public function otherUsers()
    {
        $users = User::all()->except(Auth::id());

        return view('profiles.otherUsers', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $this->authorize('update', $user->profile);

        $dataProfile = $request->validate([
            'url' => ['sometimes', 'url', 'nullable'],
            'description' => ['sometimes', 'string', 'nullable'],
            'image' => ['sometimes', 'image', 'max:3000']
        ]);

        $dataUser = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('/profilePics', 'public');
            $image = Image::make(storage_path('app/public/'.$imagePath))->fit(300, 300);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth ()
            ->user ()
            ->profile
            ->update (array_merge
            (
                $dataProfile,
                $imageArray ?? []
            ));

        auth()
            ->user()
            ->update($dataUser);

        return redirect('/profile/' . auth()->user()->profile->id);
    }

    public function search(Request $request)
    {
        $q = $request->input('q');

        $user = User::where('name', 'LIKE', '%' . $q . '%')->get();

        if (count($user) > 0)
            return view('profiles.search')->withDetails($user)->withQuery($q);

        return view('profiles.search');
    }
}
