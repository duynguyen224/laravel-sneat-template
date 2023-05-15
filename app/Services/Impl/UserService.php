<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\Interface\IUserService;
use Illuminate\Http\Request;

class UserService implements IUserService
{
    public function index(Request $request)
    {
        $users = User::where('id', '>', 1)->paginate(10);

        return compact('users');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function edit(User $user)
    {
        return compact($user);
    }

    public function update(User $user, Request $request)
    {
    }

    public function destroy(User $user)
    {
    }
}
