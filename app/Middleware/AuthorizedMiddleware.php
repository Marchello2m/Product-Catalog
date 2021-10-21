<?php

namespace App\Middleware;




class AuthorizedMiddleware implements Middleware
{
    public function handle():void
    {
        if(!  UserRegController::login())   /// nav nekā ko parbaudīt
        {
           header('Location: /login');
           exit;

        }
    }
}