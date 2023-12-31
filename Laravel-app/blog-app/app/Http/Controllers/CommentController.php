<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);
    
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'content' => $request->input('content'),
        ]);
    
        return back();
    }

    public function destroy(Comment $comment)
{
    $comment->delete();

    return redirect()->back()->with('success', 'Hozzászólás törölve!');
}
    
}
