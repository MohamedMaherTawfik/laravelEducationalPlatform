<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lessonManagment extends Model
{
    protected $table = 'lesson_managments';

    protected $fillable = ['title', 'video', 'content', 'course_managment_id', 'duration'];

    public function courseManagment()
    {
        return $this->belongsTo(courseManagment::class);
    }
}
