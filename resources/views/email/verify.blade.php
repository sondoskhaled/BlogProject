
<h1>Hello {{$user->name}}</h1>

<p>To verify Your Email please click the link below:</p>
<hr>
<p><a href="{{ url('user/verify',$user->verifyUser->token) }}">Verify your email</a></p>

