<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function createPost(Request $request)
    {
        $request->validate([
            "title" => "required",
            "user_id" => "required",
            "content" => "nullable",
            "categories_id" => "array|exists:categories,id|required",
        ]);

        try {
            $post = new Post();
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->content = $request->content;

            $post->save();

            $post->categories()->attach($request->categories_id);

            return $post;

        } catch (\Throwable $th) {
            dd($th->getMessage());
            return null;
        }
    }

    public function updatePost(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required",
            "content" => "nullable",
            "categories_id" => "array|exists:categories,id|nullable",
        ]);




        try {
            $post->title = $request->title;
            $post->content = $request->content;

            $post->save();

            $post->categories()->sync($request->categories_id);

            return $post;

        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getPost(int $id)
    {
        try {
            $post = Post::with('categories')->find($id);
            return $post;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function deletePost(int $id)
    {
        try {
            $post = Post::find($id);

            if ($post) {
                $post->delete();
            }
            return true;
        } catch (\Throwable $th) {
            return null;
        }

    }
}
