<?php

namespace App\Repositories;

use App\User;

class UserRepository
{

    public function create(array $request)
    {
        $user = User::create($request);

        $user->password = bcrypt($request['password']);
        $user->update();

        $user->billingaddress()->create($request);

        return $user;
    }

}