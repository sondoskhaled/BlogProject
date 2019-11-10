@extends('layouts.app')

@section('content')
<h2>Posts tagged {{ $tag->tag }}</h2>

    @foreach($tag->posts as $post)

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

    


    
@endsection
