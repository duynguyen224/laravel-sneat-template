<?php

namespace App\Http\Controllers;

use App\Services\Interface\IDashboardService;

class DashboardController extends Controller
{
    private IDashboardService $dashboardService;

    public function __construct(IDashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
}
