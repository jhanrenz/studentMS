<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['course_id', 'name', 'email', 'image'];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
