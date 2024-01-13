<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Online;
use App\Models\Offline;
use App\Models\UserCourse;
use Illuminate\Support\Str;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CourseCreateRequest;
use App\Http\Requests\CourseUpdateRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('offline:id,cost,start_date', 'online:id,cost,start_date')->paginate(5);
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
        $folder = Session::get('folder');

        // VALIDATION-START
        if (!$request->offline_cost && !$request->online_cost) {
            if ($request->image) {
                $temporaryImage = TemporaryImage::where('folder', $folder)->first();
                Storage::deleteDirectory('images/tmp/' . $temporaryImage->folder);
                $temporaryImage->delete();
            }
            return redirect()->back()->withInput()->with('error', "Offline or Online courses can't be empty!");
        }

        if ($request->online_start_date > $request->online_end_date or $request->offline_start_date > $request->offline_end_date) {
            if ($request->image) {
                $temporaryImage = TemporaryImage::where('folder', $folder)->first();
                Storage::deleteDirectory('images/tmp/' . $temporaryImage->folder);
                $temporaryImage->delete();
            }
            return redirect()->back()->withInput()->with('error', "End date can't be earlier than start date!");
        }
        if ($request->online_cost) {
            if (!$request->online_start_date or !$request->online_end_date) {
                if ($request->image) {
                    $temporaryImage = TemporaryImage::where('folder', $folder)->first();
                    Storage::deleteDirectory('images/tmp/' . $temporaryImage->folder);
                    $temporaryImage->delete();
                }
                return redirect()->back()->withInput()->with('error', "Courses attribute can't be empty!");
            }
            $online = Online::create([
                'cost' => $request->online_cost,
                'start_date' => $request->online_start_date,
                'end_date' => $request->online_end_date,
            ]);
        }

        if ($request->offline_cost) {
            if (!$request->offline_start_date or !$request->offline_end_date) {
                if ($request->image) {
                    $temporaryImage = TemporaryImage::where('folder', $folder)->first();
                    Storage::deleteDirectory('images/tmp/' . $temporaryImage->folder);
                    $temporaryImage->delete();
                }
                return redirect()->back()->withInput()->with('error', "Courses attribute can't be empty!");
            }
            $offline = Offline::create([
                'cost' => $request->offline_cost,
                'start_date' => $request->offline_start_date,
                'end_date' => $request->offline_end_date,
            ]);
        }
        // VALIDATION-END

        // STORING DATA-START
        $language = Str::headline($request->language);
        $temporaryImage = TemporaryImage::where('folder', $folder)->first();
        $image = $temporaryImage->folder . '/' . $temporaryImage->filename;
        if ($temporaryImage) {
            Storage::copy('images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->filename, 'images/' . $temporaryImage->folder . '/' . $temporaryImage->filename);
            Storage::deleteDirectory('images/tmp/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }

        $course = Course::create([
            'name' => $request->name,
            'image' => $image,
            'desc' => $request->desc,
            'lecture' => $request->lecture,
            'quiz' => $request->quiz,
            'duration' => $request->duration,
            'location' => $request->location,
            'language' => $language,
            'certificate' => $request->certificate,
        ]);
        if ($request->online_cost) {
            $course->online_id = $online->id;
            $course->save();
        }
        if ($request->offline_cost) {
            $course->offline_id = $offline->id;
            $course->save();
        }
        // STORING DATA-END

        return redirect()->route('index')->with('success', 'Course successfully created!');
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
    public function update(CourseUpdateRequest $request, $course)
    {
        if ($request->online_start_date > $request->online_end_date or $request->offline_start_date > $request->offline_end_date) {
            return redirect()->back()->withInput()->with('error', "End date can't be earlier than start date");
        }

        if ($request->offline_cost or $request->online_cost) {



            $course = Course::find($course);
            if ($request->image) {
                $oldImage = $course->image;
                Storage::deleteDirectory('images/' . $oldImage);

                $image = $request->file('image');
                $fileName = $image->getClientOriginalName();
                $folder = uniqid('cover-', true);
                $image->storeAs('images/' . $folder, $fileName);
                $imageName = $folder . '/' . $fileName;
            } else {
                $imageName = $course->image;
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

            if ($request->online_cost) {
                if ($course->online_id) {
                    $online = Online::find($course->online_id);
                    $online->update([
                        'cost' => $request->online_cost,
                        'start_date' => $request->online_start_date,
                        'end_date' => $request->online_end_date,
                    ]);
                } else {
                    $online = Online::create([
                        'cost' => $request->online_cost,
                        'start_date' => $request->online_start_date,
                        'end_date' => $request->online_end_date,
                    ]);

                    $course->update(['online_id' => $online->id]);
                }
            } else {
                if ($course->online_id) {
                    $online = Online::find($course->online_id);
                    $course->online_id = null;
                    $course->save();
                    $online->delete();
                }
            }

            if ($request->offline_cost) {
                if ($course->offline_id) {
                    $offline = Offline::find($course->offline_id);
                    $offline->update([
                        'cost' => $request->offline_cost,
                        'start_date' => $request->offline_start_date,
                        'end_date' => $request->offline_end_date,
                    ]);
                } else {
                    $offline = Offline::create([
                        'cost' => $request->offline_cost,
                        'start_date' => $request->offline_start_date,
                        'end_date' => $request->offline_end_date,
                    ]);

                    $course->update(['offline_id' => $offline->id]);
                }
            } else {
                if ($course->offline_id) {
                    $offline = Offline::find($course->offline_id);
                    $course->offline_id = null;
                    $course->save();
                    $offline->delete();
                }
            }

            return redirect()->route('course.index')->with('success', "Course's data successfully updated!");
        } else {
            return redirect()->back()->withInput()->with('error', "Offline or Online courses can't be empty!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($course)
    {
        $course = Course::find($course);
        if ($course->online_id) {
            $course->delete();
            $course->online->delete();
        }
        if ($course->offline_id) {
            $course->delete();
            $course->offline->delete();
        }
        return redirect()->route('index')->with('success', "Course's data successfully deleted!");
    }
}
