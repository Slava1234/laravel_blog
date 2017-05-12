<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Post;
use App\Models\Category;

class PageController extends Controller {


    public function getIndex() {
    	$posts = Post::orderBy('created_at', 'desc')->paginate(10);

        // подсчет сколько постов было сделано в каждой категории
        $catpostsnum = Category::with('posts')->get();

        return view('pages.home', [
            'posts' => $posts,
            'catpostsnum' => $catpostsnum
        ]);
        return 1;
    }

    public function getCategory($category) {
        $category_id = Category::where('name', $category)->first();
        $posts = Post::where('category_id', $category_id->id)->paginate(10);
        // подсчет сколько постов было сделано в каждой категории
        $catpostsnum = Category::with('posts')->get();

        return view('pages.category', [
            'posts' => $posts,
            'category_name' => $category,
            'catpostsnum' => $catpostsnum
        ]);
    }

    public function getAbout() {
        return view('pages.about');
    }

    public function getContact() {
        return view('pages.contact');
    }

}
