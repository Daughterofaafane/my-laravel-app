<?php

namespace App\Services;
use App\Repositories\UserRepository;

class TableService{

    protected $userService;
    function __construct(UserRepository $userRepository) {
        $this->userService = $userRepository;
    }

    public function storeUser($data) {

        $user = $this->userService->create($data);
        event(new UserRepository($user));
        return $user;
    }

    public function updateUser($data, $id) {

        return $this->userService->update($data, $id);
    }

    public function deleteUser($id){
        $this->userService->delete($id);
    }
}