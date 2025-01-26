<?php

namespace App\Repository;

use App\Models\lessonManagment;

interface lessonRepository
{

    public function all()
    {
        return lessonManagment::all();
    }

    public function find()
    {
        return lessonManagment::find(request('id'));
    }

    public function create($data)
    {
        return lessonManagment::create($data);
    }

    public function update($data)
    {
        return lessonManagment::find(request('id'))->update($data);
    }

    public function delete()
    {
        return lessonManagment::find(request('id'))->delete();
    }

}
