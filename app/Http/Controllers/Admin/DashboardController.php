<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $global = [
            'slug' => ['admin','dashboard'],
        ];
        return view('admin/dashboard/index', compact('global'));
    }
}
