<?php

namespace App\Http\Controllers\Web\Fontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $data = array(

            'posts' => Post::orderBy('created_at', 'DESC')->take(5)->get(),
            'recentPosts' => Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9),
        );
        return view('welcome', $data);
    }

    public function about()
    {
        return view('app.about');
    }

    public function category()
    {
        return view('app.category');
    }

    public function contact()
    {
        return view('app.contact');
    }

    public function post($slug)
    {
        $data = array(
            'posts' => Post::with('category', 'user')->where('slug', $slug)->first(),
        );
        if($data){
            return view('app.singlepost', $data);
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
