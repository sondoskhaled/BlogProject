<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\Post;
class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


   public function store(Request $request, $id){
        
    $request->validate([
        'comment' => 'required|min:5|max:500'
    ]);

    $post = Post::where('id',$id)->firstOrFail();
    
    $user = Auth::id();

    $com = new Comment();
    $com->body=$request->comment;
    $com->post()->associate($post);
    $com->user_id=$user;

    $com->save();

     return redirect()->route('posts.show',$id)->with('success','Comment Added Successfully');


   }
}
