@extends('layouts.app')

@section('content')
    
<div class="card mb-3">
            <h5 class="card-header">Post {{$pp->id}}</h5>
            <div class="card-body">
                <h5 class="card-title">
                    {{$pp->Title}}</h5>
                <img src="{{asset('images/posts/'.$pp->photo)}}" class='img-fluid'>    
                <p class="card-text">{!! $pp->Body !!}</p>
                @foreach($pp->tags as $t)
                <a href="{{ route('tags.show',$t->id) }}">
                    <span class="badge badge-info">
                        <i class="fas fa-tags"></i> {{$t->tag}}
                    </span>
                </a>
                @endforeach
            </div>
            @if(!Auth::guest() && (Auth::user()->id == $pp->user_id))
            <div class="card-footer">
                <div class="float-left">
                    <a href="/posts/{{$pp->id}}/edit" class="btn btn-secondary">
                    <i class="fas fa-edit"></i> Edit Post</a>
                </div>
                <div class="float-right">
                <form action="{{ route('posts.destroy', $pp->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>
                </div>
                <div class="clearfix"></div>
            </div>
            @endif
        </div>

       <h4>Comments: {{ $pp->comments->count() }}</h4>
       <ul class="comments">
           @foreach($pp->comments as $com)
           <li class="comment">
           <div class="float-left">{{ $com->user->name }}</div>
           <div class="float-right">{{ $com->created_at->format('d M Y') }}</div>
           <div class="clearfix"></div>
           <p>{{ $com->body }}</p>
           </li>
           @endforeach
       </ul>
       @guest
       <div class="alert alert-info">Please Login To Comment</div>
       @else
       <div class="card ">
       <div class="card-header">Add your Comments</div>
       <div class="card-body">
           <form action="{{ route('comments.store',$pp->id) }}" method="POST">
           @csrf
                <div class="form-group row">
                    <label for="comment" class="col-md-4 col-form-label text-md-right">Comment</label>

                    <div class="col-md-6">
                        <textarea id="comment" type="text" class="form-control" placeholder="Enter Your Comment" name="comment" value=""  autocomplete="comment"></textarea>

                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Add Comment
                        </button>
                    </div>
                </div>
           </form>
       </div>
       </div>
    @endguest


@endsection
