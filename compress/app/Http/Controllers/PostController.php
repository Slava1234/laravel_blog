<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
//use Image;


class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        // количество новых комментариев
        $allPosts = Post::all();
		$notApprovedComments = 0;
		foreach ($allPosts as $post) {
			$notApprovedComments += $post->comments()->where('approved', 0)->count().'<br>';
		}

        return view('posts.index', [
            'posts' => $posts,
            'notApprovedComments' => $notApprovedComments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // alphadash means we cant have spaces in text nut only dashes insted
        $this->validate($request, [
            'title'         => 'required|max:255',
            'slug'          => 'required|max:255|min:5|alpha_dash',
            'category_id'   => 'required|integer',
            'body'          => 'required'
        ]);

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body  = $request->body;
        // save image
        /*if($request->hasFile('feautred_image')) {
            $image = $request->file('feautred_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            // resize image and save it
            //Image::make($image)->resize(800, 400)->save(public_path('images/' . $image));
            $image->storeAs(storage_path('app/' . $image->getClientOriginalName()););
            // save the name of the file in db
            $post->image = $filename;
        }*/

        $post->save();

        // create flash var (session that exists for the single request)
        // Session::flash('key', 'value')
        Session::flash('success', 'The blog post was successfully saved!');

        // below is normal session (120 minutes)
        // Session::put('success', 'The blog post was successfully save!');

        // $post->id - primary row id in table
        return redirect()->route('posts.show', $post->id);
        // 28:52
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // если slug не был изменен
        if ($request->slug == Post::find($id)->slug) {
             $this->validate($request, [
                "title" => "required|max:255",
                'category_id' => 'required|integer',
                "body" => "required"
            ]);
        } else { // если slug изменен
             $this->validate($request, [
                "title" => "required|max:255",
                "slug" => "required_alpha_dash|min:5|max:255|unique:posts,slug",
                'category_id' => 'required|integer',
                "body" => "required"
            ]);
        }

        // update db
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->save();

        Session::flash("success", "The post is updated");
        return redirect()->route('posts.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        Session::flash("success", "The post was successfully deleted");
        return redirect()->route('posts.index');
    }

    // поиск постов в админ панели
    public function searchPost(Request $request) {
        $searchResult = Post::where('title', 'like', '%'.$request->q.'%')
				->orWhere('body', 'like', '%'.$request->q.'%')
				->get();
        return view('posts.search', ['searchResult' => $searchResult]);
    }










}
