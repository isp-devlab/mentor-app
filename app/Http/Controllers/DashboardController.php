<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        $data = [
            'title' => 'Dashboard',
            'subTitle' => null,
            'page_id' => 1,
        ];
        return view('dashboard',  $data);
    }
}
