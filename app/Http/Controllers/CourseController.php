<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Online;
use App\Models\Offline;
use App\Models\UserCourse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CourseCreateRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::select('id', 'image', 'name', 'desc', 'location', 'online_id', 'offline_id')->paginate(2);
        return view('index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseCreateRequest $request)
    {
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('public', $imageName);

        if ($request->online_cost != null) {
            $online = Online::create([
                'cost' => $request->online_cost,
                'start_date' => $request->online_start_date,
                'end_date' => $request->online_end_date,
            ]);
        } else {
            $online = null;
        }

        if ($request->offline_cost != null) {
            $offline = Offline::create([
                'cost' => $request->offline_cost,
                'start_date' => $request->offline_start_date,
                'end_date' => $request->offline_end_date,
            ]);
        } else {
            $offline = null;
        }

        $language = Str::headline($request->language);

        $course = Course::create([
            'name' => $request->name,
            'image' => $imageName,
            'desc' => $request->desc,
            'lecture' => $request->lecture,
            'quiz' => $request->quiz,
            'duration' => $request->duration,
            'location' => $request->location,
            'language' => $language,
            'certificate' => $request->certificate,
        ]);
        if ($online != null) {
            $course->online_id = $online->id;
            $course->save();
        }
        if ($offline != null) {
            $course->offline_id = $offline->id;
            $course->save();
        }


        return redirect()->route('index')->with('success', 'Course berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($course)
    {
        $course = Course::find($course);
        $language = Str::ucfirst($course->language);
        if ($course->certificate == 1) {
            $certificate = 'Yes';
        } else {
            $certificate = 'No';
        }

        $online_confirmed = UserCourse::where([
            'course_id' => $course->id,
            'confirmed' => 1,
            'online' => 1,
        ])->count();
        $online_registered = UserCourse::where([
            'course_id' => $course->id,
            'online' => 1
        ])->count();

        $offline_confirmed = UserCourse::where([
            'course_id' => $course->id,
            'confirmed' => 1,
            'offline' => 1,
        ])->count();
        $offline_registered = UserCourse::where([
            'course_id' => $course->id,
            'offline' => 1
        ])->count();

        return view('course.show', compact('course', 'language', 'certificate', 'online_registered', 'online_confirmed', 'offline_registered', 'offline_confirmed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($course)
    {
        $course = Course::find($course);
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course)
    {
        $course = Course::find($course);

        if ($request->image == null) {
            $imageName = $course->image;
        } else {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public', $imageName);
        }



        $course->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $imageName,
            'lecture' => $request->lecture,
            'quiz' => $request->quiz,
            'duration' => $request->duration,
            'location' => $request->location,
            'language' => Str::headline($request->language),
            'certificate' => $request->certificate,
        ]);

        if ($course->online_id != null) {
            $online = Online::find($course->online_id);
            $online->update([
                'cost' => $request->online_cost,
                'start_date' => $request->online_start_date,
                'end_date' => $request->online_end_date,
            ]);
        }

        if ($course->offline_id != null) {
            $offline = Offline::find($course->offline_id);
            $offline = $course->offline->update([
                'cost' => $request->offline_cost,
                'start_date' => $request->offline_start_date,
                'end_date' => $request->offline_end_date,
            ]);
        }


        return redirect()->route('course.index')->with('success', 'Data course berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course = Course::find($course)->firstOrFail();
        $course->online->delete();
        $course->offline->delete();
        $course->delete();
        return redirect()->route('index')->with('success', 'Course berhasil Dihapus');
    }
}
