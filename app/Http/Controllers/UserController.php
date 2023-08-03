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
        // $res = $this->userService->index($request);
        $users = User::where('id', '>', 1)->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'email'
        ]);

        $validateData['password'] = 'default password';

        User::create($validateData);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        dd($user);
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'email' => 'email'
        ]);

        $email = $request->get('email');

        $user->email = $email;
        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('admin.users.index');
    }
}
