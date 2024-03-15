<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mentor;
use App\Models\Role;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function mentor(Request $request){
        $search = $request->input('q');
        $data = Mentor::where('name', 'ILIKE', '%' . $search . '%')->orderBy('created_at', 'asc')->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'mentor' => $data,
            'title' => 'User Management',
            'subTitle' => 'Mentor',
            'page_id' => 5,
            'role' => Role::all()
        ];
        return view('user-management.mentor',  $data);
    }

    public function mentorDestroy($id){
        $notes = Mentor::find($id);
        $notes->delete();
        return redirect()->route('user-management.mentor')->with('success','Mentor deleted successfully');
    }

    public function mentorUpdate($id, Request $request){
        $mentor =  Mentor::findOrFail($id);
        $mentor->role_id = $request->input('roleId');
        $mentor->is_active = $request->input('status');
        $mentor->save();

        return redirect()->route('user-management.mentor')->with('success', 'Mentor updated successfully');
    }

    public function user(Request $request){
        $search = $request->input('q');
        $data = User::where('name', 'ILIKE', '%' . $search . '%')->orderBy('created_at', 'asc')->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'user' => $data,
            'title' => 'User Management',
            'subTitle' => 'User',
            'page_id' => 5,
        ];
        return view('user-management.user',  $data);
    }

    public function userDestroy($id){
        $notes = User::findOrFail($id);
        $notes->delete();
        return redirect()->route('user-management.user')->with('success','User deleted successfully');
    }

    public function userUpdate($id, Request $request){
        $mentor =  User::findOrFail($id);
        $mentor->is_active = $request->input('status');
        $mentor->save();

        return redirect()->route('user-management.user')->with('success', 'User updated successfully');
    }
}
