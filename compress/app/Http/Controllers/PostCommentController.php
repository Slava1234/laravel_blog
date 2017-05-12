<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Comment;
use App\Models\Post;

class PostCommentController extends Controller
{
    public function storeNewComment(Request $request)
    {
        /*$this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000'
        ]);

        $post = Post::find($request->post_id);
        $comment = new Comment;

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = FALSE;

        // passing here post object
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment was added!');

        //return redirect()->route('blog.single', [$post->slug]);
        return redirect('/blog/'.$post->slug);*/
        return "hgf";
    }
}
