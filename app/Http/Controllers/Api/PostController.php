<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\PostService;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $postService;
    public function __construct()
    {
        $this->postService = new PostService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $post = $this->postService->createPost($request);

        if (!$post) {
            return response()->json(["message" => "Erro ao cadastrar"], 500);
        }

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $post = $this->postService->getPost($id);

            return response()->json($post);

        } catch (\Exception $th) {
           return response()->json(["message" => "Post não encontrado"], 1002);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post = $this->postService->updatePost($request, $post);

        if(!$post) {
            return response()->json(["message" => "Erro ao atualizar"], 500);
        }

        return response()->json($post, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $response = $this->postService->deletePost($id);

            if ($response) {
                return response()->json(["message" => "Poste excluído com sucesso!"], 200);
            }

            return response()->json(["message" => "Erro ao tentar escluir", 500]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
