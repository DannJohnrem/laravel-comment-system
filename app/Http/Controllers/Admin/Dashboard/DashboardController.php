<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * The `__construct()` function is a special function that is called when a class is instantiated.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * It returns the view `admin.dashboard.index`
     *
     * @return The view file located at resources/views/admin/dashboard/index.blade.php
     */
    public function index()
    {
        return \view('admin.dashboard.index');
    }
}
