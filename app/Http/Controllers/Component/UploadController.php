<?php

namespace App\Http\Controllers\Component;

use function GuzzleHttp\Psr7\copy_to_string;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class UploadController extends Controller
{
    public function uploader(Request $request) {
        $upload = $request->file;
        if ($upload->isValid()){
            $path = $upload->store(date('ym'),'attachment');
            return ['valid'=>1,'message'=>asset('attachment/'.$path)];
        }
        return ['valid'=>0, 'message'=>'上传失败,文件大小不超过2MB'];
    }
    public function video(Request $files) {
        $videoUrlpath = Storage::disk('upyun')->put('/',$files['video']);
        $domain = env('UPYUN_DOMAIN');
        $url = 'https://'.$domain.'/'.$videoUrlpath;
        return response()->json(['valid'=> true, 'data' => $url]);
    }
}
