<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
	public function getIndex() {
		$posts = Post::paginate(3);
		return view('blog.index', ['posts' => $posts]);
	}

    public function getSingle($slug) {
    	$post = Post::where('slug', $slug)->first();
    	return view('blog.single', ['post' => $post]);
    }

	public function postSearch(Request $request) {
		$searchResult = Post::where('title', 'like', '%'.$request->q.'%')
				->orWhere('body', 'like', '%'.$request->q.'%')
				->paginate(10);

		// подсчет сколько постов было сделано в каждой категории
		$catpostsnum = Category::with('posts')->get();
        return view('blog.search', [
			'searchResult' => $searchResult,
			'catpostsnum' => $catpostsnum
		]);
    }


}
