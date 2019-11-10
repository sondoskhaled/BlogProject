<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;



class PagesController extends Controller
{
   public function index(){
       $d="ay kalam";
       return view('pages.index')->with('data',$d);
   }

   public function about(){
    
    return view('pages.about');
}

public function contact(){
    
    return view('pages.contact');
}

public function dosend(Request $request){
    
   $request->validate([
        'name'=> 'required',
        'email'=> 'required|email',
        'subject'=> 'required',
        'body'=> 'required|min:10'
   ]);

   $name =$request->input('name');
   $email =$request->input('email');
   $subject =$request->input('subject');
   $body =$request->input('body');

//    Mail::to('sondoskhaled22@gmail.com')->
//    send(new ContactUs($name,$email,$subject,$body));
    SendEmailJob::dispatch($name,$email,$subject,$body);
   return redirect('/contact')->with('success','I got your msg and will answer your asap');

}
}
