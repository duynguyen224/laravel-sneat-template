<?php

namespace App\Services\Impl;

use App\Enums\Category;
use App\Enums\Status;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderMeal;
use App\Models\OrderTable;
use App\Models\Reservation;
use App\Models\WarehouseReceipt;
use App\Services\Interface\IDashboardService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class DashboardService implements IDashboardService
{
    public function index(Request $request)
    {
        return compact('keyword');
    }
}
