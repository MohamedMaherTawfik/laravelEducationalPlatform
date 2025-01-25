<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizManagment extends Model
{
    protected $table = 'quiz_managments';

    protected $fillable = ['title', 'description', 'number_of_questions', 'passing_score', 'total_marks', 'course_managment_id'];

    public function courseManagment()
    {
        return $this->belongsTo(CourseManagment::class);
    }
}
