<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendace;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $att = Attendace::with('employee')->orderBy('created_at', 'desc')->get();

        return view('dashboard.index', compact('att'));
    }
}
