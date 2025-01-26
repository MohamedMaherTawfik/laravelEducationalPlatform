<?php


namespace App\Repository;

use App\Models\categorey;

class categoreyRepository
{
    public function all()
    {
        return categorey::all();
    }

    public function create($data)
    {
        return categorey::create($data);
    }

    public function update($data)
    {
        categorey::update($data);
    }

    public function delete()
    {
        categorey::find(request('id'))->delete();
    }

    public function find()
    {
        return categorey::find(request());
    }
}
