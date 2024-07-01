<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
   
    public function index()
    {
        $posts = Post::all();
        return response()->json(['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return response()->json(['post' => $post], 201);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        return response()->json(['post' => $post], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return response()->json(['post' => $post], 200);
    }


    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }
}
