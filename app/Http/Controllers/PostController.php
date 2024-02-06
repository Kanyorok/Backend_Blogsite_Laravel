<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return response()->json($posts);
    }

    public function create(Request $request)
    {
        $post = new Posts();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return response()->json($post, 201);
    }
    
    public function show($id)
    {
        $post = Posts::find($id);
        if ($post) {
            return response()->json($post);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $post = Posts::find($id);
        if ($post) {
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
            return response()->json($post);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    public function destroy($id)
    {
        $post = Posts::find($id);
        if ($post) {
            $post->delete();
            return response()->json(['message' => 'Post deleted']);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }
}
