<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <title>Post Success</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-12">  
        <h2>{{$post->title}}</h2>
        <small>Written By {{$post->author}}</small>
        <div>
          {{$post->message}}
        </div>
        <img src="{{$post->profile_icon}}" alt="{{$post->title}}">
      </div>
    </div>
  </div>
  
</body>
</html>