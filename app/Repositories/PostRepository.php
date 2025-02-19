<?php
namespace App\Repositories;

use App\Models\Posts;

class PostRepository{

    public function create(Array $data){
        return Posts::create($data);
    }

    public function find($id){
        return Posts::findOrFail($id);
    }

    public function store(Array $data)
    {
        return Posts::create($data);
    }

    public function update(Array $data, int $id)
    {
        $post = $this->find($id);
        return $post->update($data);
    }

    public function delete(int $id){
        
        $post = Posts::FindOrFail($id);
        return $post->delete();
    }
}
