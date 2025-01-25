<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorey extends Model
{
    protected $table = 'categoreys';
    protected $fillable = ['title', 'description','image'];

    public function courseManagment()
    {
        return $this->hasMany(courseManagment::class);
    }
}
