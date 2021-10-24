<?php

namespace App\Controllers;


use App\Repositories\MysqlUsersRepository;
use App\Repositories\UsersRepository;
use App\View;

class UsersController
{
    private UsersRepository $usersRepository;
    public function __construct()
    {

        $this->usersRepository = new MysqlUsersRepository();
    }


    public function index():View
    {
        $users = $this->usersRepository->getAll();

        return new View('users/usersRegister.twig', [
            'users' => $users
        ]);


    }
}