<?php

namespace App\Http\Controllers;

use Midtrans\Config as Midtrans;
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
                if ($request->online == 1) {
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

        return redirect()->route('index')->with('success', 'Registration success, please check your email!');
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

        return redirect()->back()->with('success', "User's registration successfully confirmed!");
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
        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function payment($usercourse)
    {

        $usercourse = UserCourse::with('course')->find($usercourse);
        if ($usercourse->online) {
            $cost = $usercourse->course->online->cost;
        } else {
            $cost = $usercourse->course->offline->cost;
        }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => $usercourse->id,
                'gross_amount' => $cost,
            ),
            'customer_details' => array(
                'name' => $usercourse->name,
                'email' => $usercourse->email,
                'phone' => $usercourse->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('usercourse.checkout', compact('snapToken', 'usercourse', 'cost'));
    }

    public function callback(Request $request)
    {
        $server_key = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $server_key);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $usercourse = Usercourse::with('course')->find($request->order_id);
                $usercourse->confirmed = 1;
                $usercourse->save();
            }
        }
    }

    public function invoice($id)
    {
        $usercourse = UserCourse::with('course')->find($id);
        return view('usercourse.invoice', compact('usercourse'));
    }
}
