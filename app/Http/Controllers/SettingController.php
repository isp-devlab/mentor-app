<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function group(Request $request){
        $search = $request->input('q');
        $data = Group::where('name', 'LIKE', '%' . $search . '%')->paginate(2);
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Setting',
            'subTitle' => 'Group',
            'page_id' => 4,
            'group' => $data,
        ];
        return view('setting.group',  $data);
    }

    public function groupDestroy($id){
        $notes = Group::find($id);
        $notes->delete();
        return redirect()->route('setting.group')->with('success','Group deleted successfully');
    }
}
