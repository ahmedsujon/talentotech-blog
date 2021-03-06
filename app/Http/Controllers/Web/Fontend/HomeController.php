<?php

namespace App\Http\Controllers\Web\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();
        $first2post = $posts->splice(0, 2);
        $middle1posts = $posts->splice(0, 1);
        $last2posts = $posts->splice(0);

        $footerposts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
        $footerfirst1post = $footerposts->splice(0, 1);
        $footermiddle2posts = $footerposts->splice(0, 2);
        $footerlast1posts = $footerposts->splice(0, 1);

        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('welcome', compact(['posts','recentPosts', 'first2post', 'middle1posts', 'last2posts','footerposts', 'footerfirst1post', 'footermiddle2posts', 'footerlast1posts']));

        // $data = array(

        //     'posts' => Post::orderBy('created_at', 'DESC')->take(5)->get(),
        //     'recentPosts' => Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9),
        // );
        // return view('welcome', $data);
    }

    public function about()
    {
        return view('app.about');
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->paginate(9);
        if($category){
            return view('app.category', compact(['category', 'posts']));
        }else{
            return redirect()->route('website');
        }

    }

    public function contact()
    {
        return view('app.contact');
    }

    public function post($slug)
    {
        $posts = Post::with('category', 'user')->where('slug', $slug)->first();
        $siderbarposts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();

        // More related post in single post page
        $relatedposts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
        $relatedfirst1posts = $relatedposts->splice(0, 1);
        $relatedmiddle2posts = $relatedposts->splice(0, 2);
        $relatedlast1posts = $relatedposts->splice(0, 1);


        $categories = Category::all();
        $tags = Tag::all();
        if($posts){
            return view('app.singlepost', compact(['posts', 'siderbarposts', 'categories', 'tags', 'relatedposts', 'relatedfirst1posts', 'relatedmiddle2posts', 'relatedlast1posts']));
        }else{
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
