<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index(Request $request){
        $data = [
            'class' => Classes::where('mentor_id', Auth::user()->id)->paginate(6),
            'title' => 'Class',
            'subTitle' => null,
            'page_id' => 3,
        ];
        return view('class.index',  $data);
    }
}
