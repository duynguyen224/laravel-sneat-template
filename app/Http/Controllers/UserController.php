<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Interface\IUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $res = $this->userService->index($request);

        return view('admin.users.index', [
            'users' => $res['users']
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user, Request $request)
    {
    }

    public function destroy(User $user)
    {
    }
}
