<h1>Published Posts</h1>

@foreach ($posts as $post)
<h1>Published Post: {{$post->title}}</h1>
<p>{{$post->message}}</p>
@endforeach