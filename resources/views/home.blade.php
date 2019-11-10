@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                <div class="btn-group float-right">
                    <a href="posts/create" class="btn btn-sm btn-white">
                        <i class="fas fa-plus"></i>
                        Create New Post
                    </a>
                </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Posts</h3>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created At</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($posts as $p)

                                <tr>
                                    <td>{{$p->Title}}</td>
                                    <td>{{$p->created_at}}</td>
                                    <td>
                                        <a href="/posts/{{$p->id}}/edit" class="btn btn-secondary btn-sm">
                                           <i class="fas fa-edit"></i>
                                            Edit Post
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $p->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete Post</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
