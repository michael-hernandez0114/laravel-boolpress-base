<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        //dd($posts);

        return view('posts.index', compact('posts'));
    }

    public function indexPublished()
    {
        $posts = Post::where('published', true)->get();
        //  dd($posts);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now()->format('Y-m-d-H-i-s');
        $data['slug'] = Str::slug($data['title'] , '-') . $now;


        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'message' => 'required',
            'author' => 'required',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('posts.create')
                ->withErrors($validator)
                ->withInput();
        }

        // $request->validate([
        //     'title' => 'required|string|max:150',
        //     'body' => 'required',
        //     'author' => 'required'
        // ]);
        
        // dd($request->all(););
        $post = new Post;
        // $article->title = $data['title'];
        $post->fill($data);
        $saved = $post->save();
        if(!$saved) {
            dd('errore di salvataggio');
        }
        
        return redirect()->route('posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //se uso $id
        //$article = Article::find($id);

        // se uso slug 
        $post = Post::where('slug', $slug)->first();
        // dd($article);

        //se non trovo articolo mando pagina 404
        if(empty($post)){
            abort('404');
        }
        
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(empty($post)) {
            abort('404');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if(empty($post)) {
            abort('404');
        }

        $data = $request->all();
        $now = Carbon::now()->format('Y-m-d-H-i-s');
        $data['slug'] = Str::slug($data['title'] , '-') . $now;


        $validator = Validator::make($data, [
            'title' => 'required|string|max:150',
            'message' => 'required',
            'author' => 'required',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('posts.edit')
                ->withErrors($validator)
                ->withInput();
        }

      
        $post->fill($data);
        $updated = $post->update();
        if(!$updated) {
            dd('Update Error');
        }
        
        return redirect()->route('posts.show', $post->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            abort('404');
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}
