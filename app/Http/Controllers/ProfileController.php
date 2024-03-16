<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use App\Services\UploadService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Profile',
            'subTitle' => null,
            'page_id' => 6,
        ];
        return view('profile.index',  $data);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required',
            'email' => [
                'sometimes',
                'required',
                'email',
                Rule::unique('mentors')->ignore(Auth::user()->id),
            ],
            'image' => 'nullable|sometimes|image|mimes:jpeg,bmp,png,jpg,svg|max:2000',
            'phoneNumber' => 'sometimes|required',
        ]);
        if ($validator->fails()) {
        return redirect()->route('profile')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $profile =  Mentor::find(Auth::user()->id);
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->phone_number = $request->input('phoneNumber');
        if($request->hasFile('image')){
            $profile->image = UploadService::api()->save($request->file('image'), 'mentor');
        }
        $profile->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
}
