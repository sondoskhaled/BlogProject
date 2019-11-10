@extends('layouts.app')

@section('content')
<h1 class="text-center">Add New Post</h1>
<hr>

<form  action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
@csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Post Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control " name="title" value=""  autocomplete="title" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">Post Body</label>

                            <div class="col-md-6">
                                <textarea id="body" type="text" class="form-control ckeditor" name="body" value=""  autocomplete="body"></textarea>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tag" class="col-md-4 col-form-label text-md-right">Tags</label>

                            <div class="col-md-6">
                                <select name="tags[]" class="form-control tagsClass" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->tag}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                <input  id="img" type="file" class="form-control" name="image"  >

                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Post
                                </button>
                            </div>
                        </div>
                    </form>

    
@endsection

@section('javascript')
     
<script type="text/javascript">
    $(document).ready(function(){
        $('.tagsClass').select2();
    });
</script>
@endsection
