<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-12">  
        <table class="table">
          <thead>
            <th>Title</th>
            <th>Author</th>
            <th colspan="3">Actions</th>
          </thead>
          <tbody>
            @foreach ($posts as $post)
                <tr>
                  <td>{{$post->title}}</td>
                  <td>Written by: {{$post->author}}</td>
                  <td><a href="{{route('posts.edit', $post->id)}}">Modify</a></td>
                  <td><a href="{{route('posts.show', $post->slug)}}">Show</a></td>
                <td><form action="{{route('posts.destroy', $post->id)}}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit">Delete</button>
                </form></td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</body>
</html>