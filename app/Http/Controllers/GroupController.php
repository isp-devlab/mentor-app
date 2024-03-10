<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index(Request $request){
        $data = [
            'group' => Teacher::where('mentor_id', Auth::user()->id)->paginate(6),
            'title' => 'Group',
            'subTitle' => null,
            'page_id' => 2,
        ];
        // dd($data);
        return view('group.index',  $data);
    }
}
