<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PostResource;


use Image;
use App\Post;
use App\Tag;
class PostsController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //all
        //$this->middleware('auth');

        //only show
        //$this->middleware('auth',['only'=>['show']]);
       
       
        //except
        $this->middleware('auth',['except'=>['index','show']]);
    }


    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p=Post::orderby('id','Desc')->paginate(3);
        $tags=Tag::all();
        return view('posts.index',compact('p','tags'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags=Tag::all();
        return view('posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //to show debug
        //dd($request);
        $request->validate([
            'title'=>'required|min:3',
            'body'=>'required',
            'img'=>'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        //currtent user
        $user=Auth::user();
       $p=new Post();
       $p->Title= $request->input('title');
       $p->Body= $request->input('body');
       $p->user_id=$user->id;

         //upload image

       if($request->hasFile('image')){
        $photo=$request->image;
        $filename=time()."-".$photo->getClientOriginalName();
        $dist=public_path('images/posts/'.$filename);
        Image::make($photo)->resize(800,400)->save($dist);
        $p->photo=$filename;
        }

       $p->save();
       $p->tags()->sync($request->tags);
       return redirect('/posts')->with('success','Post Created successfully');
    }

    /**
     * Display the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pp=Post::find($id);
        return view('posts.show',compact('pp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $po=Post::find($id);
        $userId=Auth::id();
        if($po->user_id !== $userId){
            return redirect('/posts')->with('err','That is not your post!!!!!');
        }
        $tags=Tag::all();
        return view('posts.edit',compact('po','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|min:3',
            'body'=>'required',
            'img'=>'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $p= Post::find($id);
       $p->Title= $request->input('title');
       $p->Body= $request->input('body');
       $userId=Auth::id();
       if($p->user_id !== $userId){
           return redirect('/posts')->with('err','That is not your post!!!!!');
       }
  //upload image

    if($request->hasFile('image')){
        $photo=$request->image;
        $filename=time()."-".$photo->getClientOriginalName();
        $dist=public_path('images/posts/'.$filename);
        Image::make($photo)->resize(800,400)->save($dist);
        $p->photo=$filename;
        }

       
       $p->save();
       $p->tags()->sync($request->tags);
       return redirect('/posts/'.$p->id)->with('success','Post Updated successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p= Post::find($id);
        $userId=Auth::id();
        if($p->user_id !== $userId){
            return redirect('/posts')->with('err','That is not your post!!!!!');
        }
        $p->delete();
        return redirect('/posts')->with('success','Post Deleted successfully');
   
   
    }
}
