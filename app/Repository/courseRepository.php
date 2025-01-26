<?php

namespace App\Repository;

use App\Models\courseManagment;

class courseRepository
{
    public function all()
    {
        return courseManagment::all();
    }

    public function create($data)
    {
        return courseManagment::create($data);
    }

    public function update($data)
    {
        courseManagment::find(request('id'))->update($data);
    }

    public function delete()
    {
        courseManagment::find(request('id'))->delete();
    }

    public function find()
    {
        return courseManagment::find(request('id'));
    }
}

