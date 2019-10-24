<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;

use App\Http\Requests\UpdatePostRequest;

use App\Category;

use App\Post;

use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**public function __construct()
    {
       // $this->middleware('verifyCategory')->only(['store','create']);
    }*/

    public function index()
    {
        $posts=Post::all();
      return view('post.index',compact('posts'))->with('category',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create')->with('categorys',Category::all())->with('tag',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'image'=>$request->image,
            'published_at'=>$request->published_at,
            'category_id'=>$request->category
        ]);
        $post->tags()->attach($request->tags);
        return redirect(route('post.index'));
    }
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Post $post)
    {
       // dd($post);

       return view('post.create')->with('post',$post)->with('categorys',Category::all())->with('tag',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title=$request['title'];
        $post->description=$request['description'];
        $post->content=$request['content'];
        $post->published_at=$request['published_at'];
        $post->image=$request['image'];
        $post->save();
        return redirect('post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        if($post->trashed())
        {
            $post->forceDelete();
        }
        else
        {
            $post->delete();
        }
        return redirect(route('post.trash'));
    }

    public function trashed()
    {
         $posts = Post::onlyTrashed()->get();
         return view('post.index',compact('posts'));

    }

    public function restore($id)
    {
        $post = Post::onlyTrashed('id',$id);
        $post->restore();
        return redirect('post');
    }

}
