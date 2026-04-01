<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;


class PostService
{
    public function createPost(Request $request)
    {
        $request->validate([
            "title" => "required",
            "user_id" => "required",
            "content" => "nullable"
        ]);

        try {
            $post = new Post();
            $post->user_id = $request->user_id;
            $post->title = $request->title;
            $post->content = $request->content;

            $post->save();

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
            "content" => "nullable"
        ]);

        try {
            $post->title = $request->title;
            $post->content = $request->content;

            $post->save();

            return $post;

        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getPost(int $id)
    {
        try {
            return Post::find($id);
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
