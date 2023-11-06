<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\SavePostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use PharIo\Manifest\Author;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        $post->load('comments', 'user');
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $post = new Post;
        $categories = Category::all();
        return view('posts.create', compact('post', 'categories'));
    }
    public function store(SavePostRequest $request)
    {
        $post = new Post;
        $post->fill($request->validated());
        $post->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->store();
            $post->image = $image->hashName();
        }
        $post->save();
        return to_route('posts.show', $post)->with('status', 'post creado exito!');
    }

    public function deleteImage($imageFileName)
    {
        $imagePath = public_path('storage/' . $imageFileName);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
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
            $image = $request->file('image');
            $image->store();
            $post->image = $image->hashName();
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
        return to_route('posts.index')->with('status', '¡Post Eliminado!');
    }
    public function by_category($category)
    {
        // Obtén todas las publicaciones del tema especificado
        $posts = Post::where('category_id', $category)->get();

        // Devuelve las publicaciones
        return view('posts.index', compact('posts'));
    }
    public function by_author()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.index', compact('posts'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('title', 'like', "%$query%")
            ->orWhere('body', 'like', "%$query%")
            ->orWhereHas('user', function ($userQuery) use ($query) {
                $userQuery->where('name', 'like', "%$query%");
            })
            ->orWhereHas('category', function ($categoryQuery) use ($query) {
                $categoryQuery->where('category', 'like', "%$query%");
            })
            ->get();

        return view('posts.index', compact('posts'));
    }
}
