<?php

namespace App\Models;

use App\Models\Online;
use App\Models\Offline;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

    public function offline()
    {
        return $this->belongsTo(Offline::class);
    }

    public function online()
    {
        return $this->belongsTo(Online::class);
    }
}
