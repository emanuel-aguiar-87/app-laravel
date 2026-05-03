<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
    public function index(Request $request)
    {
        $query = Post::query();

        if($request->search) {
            $query->where("title", "like", "%{$request->search}%");
        }

        if($request->start_date) {
            $query->whereDate("created_at", ">=", $request->start_date);
        }
        if($request->end_date) {
            $query->whereDate("created_at", "<=", $request->end_date);
        }


        $posts = $query->paginate(5);

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

            return response()->json(PostResource::make($post));

        } catch (\Exception $th) {
           return response()->json(["message" => "Post não encontrado"], 1002);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        if(Gate::denies('update-post', $post)){
            return response()->json(["error" => "Acesso negado"], 403);
        }

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
