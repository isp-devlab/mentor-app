<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use App\Models\Mentor;
use App\Models\Teacher;
use App\Models\Discussion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\UploadService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    public function index(Request $request){
        $data = [
            'group' => Teacher::where('mentor_id', Auth::user()->id)->paginate(6),
            'title' => 'Group',
            'subTitle' => null,
            'page_id' => 2,
        ];
        // dd($data['group'][0]->group);
        return view('group.index',  $data);
    }

    public function overview($id){
        $data = [
            'group' => Group::findOrFail($id),
            'title' => 'Group',
            'subTitle' => 'Overview',
            'page_id' => 2,
        ];
        return view('group.overview',  $data);
    }

    
    public function overviewReset($id){
        $group =  Group::find($id);
        $group->referral_code = Str::lower(Str::random(8));
        $group->save();
        return redirect()->route('group.overview', $id)->with('success', 'Referral code has been reset successfully');
    }

    public function mentor($id){
        $data = [
            'group' => Group::findOrFail($id),
            'allMentors' => Mentor::where('is_active', true)
                        ->whereNotIn('id', function ($query) {
                            $query->select('mentor_id')
                                ->from('teachers');
                        })
            ->get(),
            'mentor' => Teacher::where('group_id', $id)->get(),
            'title' => 'Group',
            'subTitle' => 'Mentor',
            'page_id' => 2,
        ];
        return view('group.mentor',  $data);
    }

    public function mentorStore($id, Request $request){
        $validator = Validator::make($request->all(), [
            'mentorId' => 'required',
        ]);
        if ($validator->fails()) {
        return redirect()->route('group.mentor', $id)->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $teacher =  New Teacher();
        $teacher->group_id = $id;
        $teacher->mentor_id = $request->input('mentorId');
        $teacher->save();

        return redirect()->route('group.mentor', $id)->with('success', 'Mentor joined successfully');
    }

    public function mentorDestroy($id, $idTeacher){
        $teacher = Teacher::find($idTeacher);
        $teacher->delete();
        return redirect()->route('group.mentor', $id)->with('success','Mentor Leaved successfully');
    }


    public function member($id){
        $data = [
            'group' => Group::findOrFail($id),
            'member' => Member::where('group_id', $id)->get(),
            'title' => 'Group',
            'subTitle' => 'Member',
            'page_id' => 2,
        ];
        return view('group.member',  $data);
    }

    public function memberDestroy($id, $idMember){
        $teacher = member::find($idMember);
        $teacher->delete();
        return redirect()->route('group.member', $id)->with('success','Member Leaved successfully');
    }

    public function discussion($id){
        $data = [
            'group' => Group::findOrFail($id),
            'discussion' => Discussion::where('group_id', $id)->orderBy('created_at', 'desc')->paginate(5),
            'title' => 'Group',
            'subTitle' => 'Discussion',
            'page_id' => 2,
        ];
        return view('group.discussion',  $data);
    }

    public function discussionStore($id, Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'attachment' => 'nullable|sometimes|mimes:jpeg,png,jpg,pdf,xlxs,docx,pptx|max:2000',
        ]);
        if ($validator->fails()) {
        return redirect()->route('group.discussion', $id)->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $discussion =  New Discussion();
        $discussion->group_id = $id;
        $discussion->mentor_id = Auth::user()->id;
        $discussion->title = $request->title;
        $discussion->content = $request->content;
        if($request->has('attachment')){
            $file = $request->file('attachment');
            $originalName = $file->getClientOriginalName();
            $path = UploadService::api()->save($file, 'discussion/group_'.$id);
            $sizeInBytes = $file->getSize();
            $sizeInKilobytes = $sizeInBytes / 1024;
            $sizeInMegabytes = $sizeInKilobytes / 1024;
            $sizeInGigabytes = $sizeInMegabytes / 1024;
            $formattedSize = '';
            if ($sizeInGigabytes >= 1) {
                $formattedSize = number_format($sizeInGigabytes, 2) . ' GB';
            } elseif ($sizeInMegabytes >= 1) {
                $formattedSize = number_format($sizeInMegabytes, 2) . ' MB';
            } elseif ($sizeInKilobytes >= 1) {
                $formattedSize = number_format($sizeInKilobytes, 2) . ' KB';
            } else {
                $formattedSize = $sizeInBytes . ' bytes';
            }            
            $doc = [
                'file' =>  $originalName,
                'path' => $path,
                'size' => $formattedSize
            ];
            $discussion->attach_file = json_encode($doc);
        };
        $discussion->save();

        return redirect()->route('group.discussion', $id)->with('success', 'Discussion added successfully');
    }

    
    public function discussionDestroy($id, $idDiscussion){
        $discussion = Discussion::find($idDiscussion);
        $discussion->delete();
        return redirect()->route('group.discussion', $id)->with('success','Discussion deleted successfully');
    }

    public function assignment($id){
        $data = [
            'group' => Group::findOrFail($id),
            'title' => 'Group',
            'subTitle' => 'Assignment',
            'page_id' => 2,
        ];
        return view('group.assignment',  $data);
    }
}
