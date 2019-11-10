@extends('layouts.app')

@section('content')

@if($p->count()>0)
<div class="row">
 <div class="col-md-8">
    @foreach($p as $post)
    
        <div class="card mb-3">
            <h5 class="card-header">Post #{{$post->id}}</h5>
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/posts/{{$post->id}}">{{$post->Title}}</a></h5>
                <p class="card-text">{{ str_limit(strip_tags($post->Body),30) }}</p>
            </div>
            <div class="card-footer">
                <span class="lable lable-info">
                    <i class="fas fa-calendar"></i>
                    {{$post->created_at}}
                </span>

                <span class="lable lable-primary ml-2">
                    <i class="fas fa-user"></i>
                    {{$post->user->name}}
                </span>
            </div>
        </div>
        
    @endforeach
 </div>
    <div class="col-md-4">
    <div class="card text-white  mb-3" style="max-width: 20rem;">
        <div class="card-header bg-primary">Tags</div>
        <div class="card-body">
             @foreach($tags as $t)
                <a href="{{ route('tags.show',$t->id) }}" class="btn btn-primary btn-xs mb-2">
                    
                        <i class="fas fa-tags"></i> {{$t->tag}}
                    
                </a>
             @endforeach
        </div>
    </div>
    </div>
</div>
<div class="col-7 offset-5 text-center">
    {{$p->links()}}
</div>
@else 
    <div class="alert alert-info">
        <strong>Ooops</strong>No Posts
    </div>
@endif

    
@endsection
