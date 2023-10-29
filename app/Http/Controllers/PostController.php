<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PharIo\Manifest\Author;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth", ["except"=> ["index","show"]]);
    }
    public function index()
    {
        $posts = Post::get();

        return view('posts.index', ['posts'=> $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create', ['post'=> new Post]);
    }
    public function store(SavePostRequest $request)
    {   
        $post = new Post();
        $post->fill($request->validated());
        $post->author = Auth::user()->name;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image->store();
            $post->image = $image->hashName();
        }
        
        $post->save();
        return to_route('posts.show',$post)->with('status','¡Post creado exitosamente!');
    }

    public function deleteImage($imageFileName) {
        $imagePath = public_path('storage/'.$imageFileName);
    
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=> $post]);	
    }

    public function update(SavePostRequest $request, Post $post)
    {
        $image = $post->image;
        $post->update($request->validated());
    
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior
            if (!empty($image)) {
                $this->deleteImage($image);
            }
    
            $newImage = $request->file('image');
            $newImage->store();
            $post->image = $newImage->hashName();
        }
    
        $post->save();
    
        return redirect()->route('posts.show', $post)->with('status', '¡Post actualizado exitosamente!');
    }
    
    public function destroy(Post $post)
    {
        if (!empty($post->image)) {
            $this->deleteImage($post->image);
        }    
        $post->delete();
        return to_route('posts.index')->with('status','¡Post Eliminado!');
    }
    public function by_category($category)
    {
        // Obtén todas las publicaciones del tema especificado
        $posts = Post::where('category', $category)->get();

        // Devuelve las publicaciones
        return view('posts.index', compact('posts'));
    }
    public function by_author()
    {
        // Obtén todas las publicaciones del tema especificado
        $posts = Post::where('author', Auth::user()->name)->get();

        // Devuelve las publicaciones
        return view('posts.index', compact('posts'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('title', 'like', "%$query%")
                    ->orWhere('body', 'like', "%$query%")
                    ->orWhere('author', 'like', "%$query%")
                    ->orWhere('category', 'like', "%$query%")
                    ->get();

        return view('posts.index', compact('posts'));
    }
}


