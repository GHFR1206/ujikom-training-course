<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class Offline extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
