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
        $cookie_name = md5($_SERVER['REMOTE_ADDR']);
        $cookie_value = sha1($_SERVER['REMOTE_ADDR']);

        # проверка сессии
        if (!isset($_COOKIE[$cookie_name])) 
        {   
            $this->validate($request, [
                'username' => 'required|max:255',
                'userEmail' => 'required|email|max:255',
                'userComment' => 'required|min:5|max:2000'
            ]);

            $post = Post::find($request->post_id);
            $comment = new Comment;

            $comment->name = $request->username;
            $comment->email = $request->userEmail;
            $comment->comment = $request->userComment;
            $comment->approved = FALSE;

            // passing here post object
            $comment->post()->associate($post);
            $comment->save();

            // устанавливаем cookie на 5 минут
            setcookie($cookie_name, $cookie_value, time() + (60 * 5), "/"); 

            return "done";
        } else {
            return "cookie_exists";
        }
    }
}
