<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Tag;

use App\Category;

class WelcomeController extends Controller
{

    public function index()
    {
        if(request()->query('search'))
        {
            dd(request()->query('search'));
        }
        return view('welcome')->with('post',Post::paginate(2))->with('tag',Tag::all())->with('category',Category::all());
    }
}
