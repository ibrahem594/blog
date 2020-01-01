<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts=Post::all();

        return view('home',compact('posts'));
    }
    public function getpage($name)
    {
       if($name !=''){
           $page=Page::where('title',$name)->first();
           if($page){
               return view('page',compact('page'));
           }
       }
       return redirect()->back();
    }
    public function getpost ($id)
    {

            $post=Post::findorfail('id');
            if($post){
                $comment=Comment::where('post_id',$post->id);
                return view('post',compact('post','comment'));
            }

        return redirect()->back();
    }
    public function comment (Request $request)
    {

        $comment=$request->comment;
        if($comment){
            $c=new Comment();
            $c->user_id=Auth::user()->id;
            $c->post_id=$request->post_id;
            $c->comment=$request->comment;
            $c->save();
            return redirect()->back();
        }


    }

}
