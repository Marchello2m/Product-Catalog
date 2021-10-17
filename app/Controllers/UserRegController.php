<?php
namespace  App\Controllers;

use App\Models\User;
use App\Repositories\MysqlUsersRepository;
use App\Repositories\UsersRepository;
use Ramsey\Uuid\Nonstandard\Uuid;


class UserRegController
{
    private UsersRepository $usersRepository;

    public function __construct()
    {
        $this->usersRepository=new MysqlUsersRepository();
    }


    public function showRegisterForm()
    {
        require_once 'app/Views/users/signUp.php';
    }

    public function register()
    {
        $this->usersRepository->save(
            new User(
                Uuid::uuid4(),
                $_POST['email'],
                $_POST['name'],
                password_hash($_POST['password_confirmation'],PASSWORD_DEFAULT),

            )

        );

        header('Location: /');
    }
    public function showLoginForm()
    {
        require_once 'app/Views/users/login.php';
    }



    public function login()
    {
        $user = $this->usersRepository->getByEmail($_POST['email']);

        if ($user !== null && password_verify($_POST['password'],$user->getPassword()))
        {
            $_SESSION['authId']=$user->getId();
            header('Location: /login');

            exit;
        }

        header( 'Location: /app/Views/main.template.php');

    }
    public function showLogOutForm()
    {
        require_once 'app/Views/products/index.template.php';
    }


    public function logout()
    {
        unset($_SESSION['authId']);
        header( 'Location: /login');
    }
}