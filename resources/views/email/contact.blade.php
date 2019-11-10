@extends('Layouts.app')

@section('content')

<h1>Hi Admin </h1>

<p>You Have new Email from {{$name}}</p>
<p>Subject: {{$subject}}</p>
<p>Email: {{$email}}</p>
<hr>
<p>The message is: {{$body}}</p>
@endsection