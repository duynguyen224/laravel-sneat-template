<?php

namespace App\Services\Interface;

use Illuminate\Http\Request;

interface IDashboardService
{
    public function index(Request $request);
}
