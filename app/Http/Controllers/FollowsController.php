<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->following()->toggle($user->profile->id);

        return Redirect::back();
    }
}
