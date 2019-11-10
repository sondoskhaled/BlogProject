@extends('Layouts.app')

@section('content')
<h1>Contact US</h1>
<hr>

<form method="POST" action="{{ route('dosend') }}">
@csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>

                            </div> 
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" >

                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>

                            <div class="col-md-6">
                                <input id="subject" type="txet" class="form-control " name="subject" value="" required autocomplete="subject" >

                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">Post Body</label>

                            <div class="col-md-6">
                                <textarea id="body" type="text" class="form-control ckeditor" name="body" value=""  autocomplete="body"></textarea>

                            </div>
                        </div>

                    
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                            </div>
                        </div>
                    </form>
@endsection

