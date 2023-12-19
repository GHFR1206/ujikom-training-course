<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use App\Models\Course;
use App\Models\Online;
use App\Mail\UserEmail;
use App\Mail\AdminEmail;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UserCourseRequest;

class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usercourses = UserCourse::where('user_id', Auth::user()->id)->paginate(5);
        return view('usercourse.index', compact('usercourses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_online($usercourse)
    {
        $course = Course::find($usercourse);
        return view('usercourse.create', compact('course'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCourseRequest $request)
    {
        $user = UserCourse::where('name', $request->name)->first();
        if ($user == null) {
            $usercourse = UserCourse::create([
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'instance' => $request->instance,
                'course_id' => $request->course_id,
                'user_id' => Auth::user()->id,
                'confirmed' => 0,
            ]);
            if ($request->online == 1) {
                $usercourse->online = 1;
                $usercourse->save();
            } else {
                $usercourse->offline = 1;
                $usercourse->save();
            }
        } else {
            $user = UserCourse::where('name', $request->name)->first();
            if ($user->course_id == $request->course_id) {
                if ($user->online == null) {
                    $user->online = 1;
                    $user->save();
                } else {
                    $user->offline = 1;
                    $user->save();
                }
            } else {
                $usercourse = UserCourse::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'instance' => $request->instance,
                    'course_id' => $request->course_id,
                    'user_id' => Auth::user()->id,
                    'confirmed' => 0,
                ]);
                if ($request->online == 1) {
                    $usercourse->online = 1;
                    $usercourse->save();
                } else {
                    $usercourse->offline = 1;
                    $usercourse->save();
                }
            }
        }
        $requests = $request->all();
        Mail::to('smartinsight.id@gmail.com')->send(new AdminEmail($requests));
        Mail::to($request->email)->send(new UserEmail($request->all()));

        return redirect()->route('index')->with('success', 'Berhasil registrasi, silahkan cek email anda!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function show($userCourse)
    {
        $course = Course::find($userCourse);
        $usercourses = UserCourse::where('course_id', $course->id)->latest()->paginate(5);

        return view('usercourse.show', compact('course', 'usercourses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCourse $userCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userCourse)
    {
        $usercourse = UserCourse::find($userCourse);
        $usercourse->confirmed = 1;
        $usercourse->save();

        return redirect()->back()->with('success', 'Registrasi user berhasil dikonfimasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCourse  $userCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCourse $usercourse)
    {
        $usercourse = UserCourse::find($usercourse)->firstOrFail();
        $usercourse->delete();
        return redirect()->back()->with('success', 'Berhasil dihapus!');
    }
}
