<?php

namespace App\Http\Controllers\Admin;

use App\Model\Lesson;
use App\Model\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::get();
        return view('admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lesson $lesson)
    {
        $lesson['title'] = $request['lessontitle'];
        $lesson['desc'] = $request['desc'];
        $lesson['preview'] = $request['preview'];
        $lesson['iscommend'] = $request['iscommend'];
        $lesson['ishot'] = $request['ishot'];
        $lesson['clicks'] = $request['clicks'];
        $lesson->save();

        $videos = \GuzzleHttp\json_decode($request['videos'],true);
        foreach ($videos as $video){
            $lesson->videos()->create([
                'title' => $video['title'],
                'path' => $video['path']
            ]);
        }
        return redirect('admin/lesson');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $lesson = Lesson::find($id);
        $videos = \GuzzleHttp\json_encode($lesson->videos()->get()->toArray(), JSON_UNESCAPED_UNICODE);

        return view('admin.lesson.edit',compact('lesson','videos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $lesson['title'] = $request['lessontitle'];
        $lesson['desc'] = $request['desc'];
        $lesson['preview'] = $request['preview'];
        $lesson['iscommend'] = $request['iscommend'];
        $lesson['ishot'] = $request['ishot'];
        $lesson['clicks'] = $request['clicks'];
        $lesson->save();
        Video::where('lesson_id', $id)->delete();
        $videos = \GuzzleHttp\json_decode($request['videos'],true);
        foreach ($videos as $video){
            $lesson->videos()->create([
                'title' => $video['title'],
                'path' => $video['path']
            ]);
        }
        return redirect('admin/lesson');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
