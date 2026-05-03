<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
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
        $posts = Post::paginate(10);

        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            "user_id" => auth()->id()
        ]);

        $post = $this->postService->createPost($request);

        if (!$post) {
            // return response()->json(["message" => "Erro ao cadastrar"], 500);
            //seta na sessão uma mensagem de erro
        }

        return redirect()->route('posts.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $post = $this->postService->updatePost($request, $post);

        if (!$post) {
            // return response()->json(["message" => "Erro ao cadastrar"], 500);
            //seta na sessão uma mensagem de erro
            return redirect()->back()->withInput();
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
