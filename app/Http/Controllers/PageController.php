<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PageController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }

    //obtener todos los post registrados en la tabla post
    public function posts(){
        Paginator::useBootstrap();
        return view('posts', [
            'posts' => Post::with('user')->latest()->paginate(5)
        ]);
    }

    //obtener un post unicamente que se obtendra usando el parametro $post
    public function post(Post $post){
        return view('post' , ['post' => $post]);
    }
}
