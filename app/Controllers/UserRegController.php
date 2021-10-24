<?php

namespace App\Controllers;

use App\Models\User;
use App\Repositories\MysqlUsersRepository;
use App\Repositories\UsersRepository;
use App\View;
use Ramsey\Uuid\Nonstandard\Uuid;


class UserRegController
{
    private UsersRepository $usersRepository;

    public function __construct()
    {
        $this->usersRepository = new MysqlUsersRepository();
    }


    public function showRegisterForm():View
    {
        $user = $this->usersRepository->getAll();

        return new View('users/signUp.twig', [
            'user' => $user
        ]);

    }

    public function register()
    {
        $this->usersRepository->save(
            new User(
                Uuid::uuid4(),
                $_POST['name'],
                $_POST['email'],
                password_hash($_POST['password_confirmation'], PASSWORD_DEFAULT),

            )

        );

        header('Location: /');
    }

    public function showLoginForm():View
    {
        $user=$this->usersRepository->getAll();
        return new View('users/login.twig', [
            'user' => $user
        ]);

    }

    public function main():View
    {$user= $this->usersRepository->getAll();

        return new View('main.template.twig', [
            'users' => $user
        ]);


    }


    public function login(): void
    {
        $user = $this->usersRepository->getByEmail($_POST['email']);

        if ($user !== null && password_verify($_POST['password'], $user->getPassword())) {
            $_SESSION['authId'] = $user->getId();
            header('Location: /login');

            exit;
        }

        header('Location: /main');

    }

    public function showLogOutForm():View
    {
        $user= $this->usersRepository->getAll();

        return new View('products/index.template.twig', [
            'users' => $user
        ]);

    }


    public function logout()
    {
        unset($_SESSION['authId']);
        header('Location: /login');
    }
}