<?php

namespace App\Services\Interface;

use App\Models\User;
use Illuminate\Http\Request;

interface IUserService
{
    public function index(Request $request);
    public function create();
    public function store(Request $request);
    public function edit(User $user);
    public function update(User $user, Request $request);
    public function destroy(User $user);
}
