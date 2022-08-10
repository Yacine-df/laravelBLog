<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(post $post){

        request()->validate([
            'body'=> 'required'
        ]);

        $post->comments()->create([
            'user_id'=> auth()->user()->id,
            'body'=> request('body')
        ]);

        return back();
    }
}
