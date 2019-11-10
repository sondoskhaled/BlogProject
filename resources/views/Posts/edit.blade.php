@extends('layouts.app')

@section('content')
<h1 class="text-center">Edit Post #{{ $po->id }}</h1>
<hr>

<form  action="{{ route('posts.update', $po->id) }}" method="POST" enctype="multipart/form-data">
@csrf
    @method('PATCH')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Post Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control " name="title" value="{{$po->Title}}"  autocomplete="title" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">Post Body</label>

                            <div class="col-md-6">
                                <textarea id="body" type="text" class="form-control ckeditor" name="body" value=""  autocomplete="body">{{$po->Body}}</textarea>

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

                        <img style="max-width:200px;" class="img-fluid" src="{{ asset('images/posts/'.$po->photo) }}" />





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Edit Post
                                </button>
                            </div>
                        </div>
                    </form>

    
@endsection

@section('javascript')
     
<script type="text/javascript">
    $(document).ready(function(){
        $('.tagsClass').select2().val({!! json_encode($po->tags()->pluck('id')) !!}).trigger('change');
    });
</script>
@endsection
 