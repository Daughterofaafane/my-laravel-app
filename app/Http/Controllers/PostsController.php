<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Posts;
use App\Services\PostService;

class PostsController extends Controller
{
    protected $postRepo;
    function __construct(PostService $postService){

        $this->postRepo = $postService;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Posts::all();
        return view('posts.posts', ['posts'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.addPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // $data = $request->all();
        $this->postRepo->storepost($request);
        session()->flash('add', 'Post created successfully');
        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.show', ['posts' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.edit', ['data'=>$post]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $this->postRepo->updatePost($request, $id);
        session()->flash('update', 'Post updated succesfully');

        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->postRepo->deletepost($id);
        session()->flash('delete', 'Post successfully deleted');
        return redirect()->back();
    }
}
