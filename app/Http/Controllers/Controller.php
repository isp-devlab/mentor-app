<?php

namespace App\Http\Controllers;

use Nette\Utils\Image;
use Illuminate\Http\Request;
use App\Services\UploadService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function upload(Request $request){
        if ($request->hasFile('upload')) {
            $path = UploadService::api()->save($request->file('upload'), 'discussion/group_'.$request->id);
            return response()->json([
                'url' => $path
            ]);
        }
    }
}
