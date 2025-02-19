<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Storage;

class PostService{

    protected $postService;
    function __construct(PostRepository $postRepository) {
        $this->postService = $postRepository;
    }

    public function storepost(PostRequest $request) {

        $data = $request->only(['title', 'author', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts','public');
        }
        // else {
        //     $data['image'] = null;
        // }
        // dd($request->file('image'));
        $post = $this->postService->create($data);
        event(new PostRepository($post));
        return $post;
    }

    public function updatepost(PostRequest $request, $id) {

        $data = $request->only(['title', 'author', 'description']);
        $post = $this->postService->find($id);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts','public');
        }

        return $this->postService->update($data, $id);
    }

    public function deletepost($id){
        $post = $this->postService->find($id);
        Storage::disk('public')->delete($post->image);
        $this->postService->delete($id);
    }
}