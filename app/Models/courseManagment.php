<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courseManagment extends Model
{
    protected $table = 'course_managments';
    protected $fillable = ['title', 'description', 'image', 'file', 'categorey_id', 'price'];

    public function categorey()
    {
        return $this->belongsTo(categorey::class);
    }

    public function lessons()
    {
        return $this->hasMany(lessonManagment::class);
    }

    public function quiz()
    {
        return $this->hasMany(QuizManagment::class);
    }
}
