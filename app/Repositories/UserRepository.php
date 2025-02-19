<?php
namespace App\Repositories;

use App\Models\Table;

class UserRepository{

    public function create(Array $user){
        return Table::create($user);
    }

    public function find($id){
        return Table::findOrFail($id);
    }

    public function store(Array $data)
    {
        return Table::create($data);
    }

    public function update(Array $data, int $id)
    {
        $user = $this->find($id);
        return $user->update($data);
    }

    public function delete(int $id){
        
        $user = Table::FindOrFail($id);
        return $user->delete();
    }
}
