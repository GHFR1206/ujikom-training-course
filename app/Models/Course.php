<?php

namespace App\Models;

use App\Models\OnlineCourse;
use App\Models\OfflineCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function usercourse()
    {
        return $this->belongsTo(UserCourse::class, 'course_id', 'id');
    }

    public function online()
    {
        return $this->hasOne(Online::class, 'id');
    }

    public function offline()
    {
        return $this->hasOne(Offline::class, 'id');
    }
}
