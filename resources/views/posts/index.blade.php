<h1>Welcome!</h1>

@foreach ($posts as $post)
    <h1>Post Title: {{$post->title}}</h1>
    <p>Message: {{$post->message}}</p>
@endforeach


