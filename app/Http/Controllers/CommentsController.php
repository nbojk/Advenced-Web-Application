<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'body' => 'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return Redirect::back();
    }
}
