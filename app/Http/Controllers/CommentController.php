<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(SaveCommentRequest $request, Post $post)
    {
        $comment = new Comment();
        $comment->fill($request->validated());
        $comment->user()->associate(auth()->user());
        $comment->post()->associate($post);
        $comment->save();

        return $request;
    }
}
