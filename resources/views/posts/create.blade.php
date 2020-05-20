<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creates</title>
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
<form action="{{route('posts.store')}}" method="POST">
  @csrf
  @method('POST')
    <div>
      <label for="title">Title</label>
      <input type="text" placeholder="Please enter a title" name="title">
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div>
      <label for="title">Message</label>
      <textarea name="body" cols="30" rows="10">Enter your Post</textarea>
    </div>
    <div>
      <label for="title">Author</label>
      <input type="text" placeholder="Enter the name of the author" name="author">
    </div>
    <div>
      <label for="title">Category</label>
      <input type="text" placeholder="Post Category" name="category">
    </div>
    <div>
      <label for="title">Profile Icon</label>
      <input type="text" placeholder="Enter your icon" name="profile_icon">
    </div>
    <div>
      <label for="not-published">Not Published</label>
      <input type="radio" id="not-published" name="published" value="0">
      <label for="published">Published</label>
      <input type="radio" id="published" name="published" value="1">
    </div>
    <div>
      <input type="submit" value="Save">
    </div>
  </form>
</body>
</html>