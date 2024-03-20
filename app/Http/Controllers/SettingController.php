<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Group;
use Ramsey\Uuid\Uuid;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function Class(Request $request){
        $search = $request->input('q');
        $data = Classes::where('name', 'ILIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Setting',
            'subTitle' => 'Class',
            'page_id' => 4,
            'class' => $data,
        ];
        return view('setting.class',  $data);
    }


    public function group(Request $request){
        $search = $request->input('q');
        $data = Group::where('name', 'ILIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(10);
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

    public function groupStore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
        return redirect()->route('setting.group')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $uuid = Uuid::uuid4();

        $group =  New Group();
        $group->id = $uuid;
        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->referral_code = Str::lower(Str::random(8));
        $group->save();

        return redirect()->route('group.mentor', $uuid)->with('success', 'Group created successfully');

    }

    public function groupUpdate($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
        return redirect()->route('setting.group')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $group =  Group::find($id);
        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->save();

        return redirect()->route('setting.group')->with('success', 'Group updated successfully');
    }
}
