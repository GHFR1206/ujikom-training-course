<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;


class UserCourseExport implements FromView
{
    public $usercourse;
    public $now;

    use Exportable;

    public function __construct($usercourse, $now)
    {
        $this->usercourse = $usercourse;
        $this->now = $now;
    }

    public function view(): view
    {
        return view('usercourse.excel', [
            'usercourse' => $this->usercourse,
            'now' => $this->now,
        ]);
    }
}
