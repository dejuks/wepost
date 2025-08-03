<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        $categories = Category::all();
        return view('list', compact('posts','categories'));
    }
    public function store(Request $request)
    {
        $auth=Auth::user();
        $newPost = new Post();
        $newPost->title=$request->title;
        $newPost->content=$request->content;
        $newPost->user_id=$auth->id;
        $newPost->category_id=$request->category_id;
        $newPost->save();
return redirect()->back();
    }
    public function edit($id){
        $post=Post::find($id);
        $categories = Category::all();

        return view('edit', compact('post','categories'));
    }
    public function update(Request $request,$id){
        $post=Post::find($id);
       $post->title=$request->title;
       $post->content=$request->content;
       $post->category_id=$request->category_id;
       $post->save();
        return redirect('/')->with('success','Successfully Updated');
    }

    public function show($id)
    {
        $post=Post::with('category','user')->find($id);
        return view('show',compact('post'));

    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back()->with('success','Successfully Deleted');

    }

    public function myposts()
    {
        $user=auth()->user();
        $categories = Category::all();
        $posts=Post::with('category','user')->where('user_id',$user->id)->paginate(5);
        return view('mypostlist',compact('posts','categories'));
    }
}
