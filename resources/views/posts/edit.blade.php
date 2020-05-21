<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edits</title>
</head>
<body>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('posts.update', $post->id)}}" method="POST">
  @csrf
  @method('PUT')
    <div>
      <label for="title">Title</label>
      <input type="text" placeholder="Please enter a title" name="title" value="{{$post->title}}">
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div>
      <label for="title">Message</label>
    <textarea name="message" cols="30" rows="10" placeholder="Enter your post">{{$post->message}}</textarea>
    </div>
    <div>
      <label for="title">Author</label>
      <input type="text" placeholder="Enter the name of the author" name="author" value="{{$post->author}}">
    </div>
    <div>
      <label for="title">Category</label>
      <input type="text" placeholder="Post Category" name="category" value="{{$post->category}}">
    </div>
    <div>
      <label for="title">Profile Icon</label>
      <input type="text" placeholder="Enter your icon" name="profile_icon" value="{{$post->profile_icon}}">
    </div>
    <div>
      <label for="not-published">Not Published</label>
      <input type="radio" id="not-published" name="published" value="0" {{($post->published == 0) ? 'checked' : ''}}>
      <label for="published">Published</label>
      <input type="radio" id="published" name="published" value="1" {{($post->published == 1) ? 'checked' : ''}}>
    </div>
    <div>
      <input type="submit" value="Save">
    </div>
  </form>
</body>
</html>