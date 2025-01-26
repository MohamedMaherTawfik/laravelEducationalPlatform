<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\lessonRequest;
use App\Services\lessonServices;

class lessonManagment extends Controller
{
    private $lessonServices;

    public function __construct(lessonServices $lessonServices)
    {
        $this->lessonServices=$lessonServices;
    }

    public function create(lessonRequest $request)
    {
        return $this->lessonServices->createLesson($request);
    }

    public function update(lessonRequest $request)
    {
        return $this->lessonServices->updateLesson($request);
    }

    public function delete()
    {
        return $this->lessonServices->deleteLesson();
    }

    public function index()
    {
        return $this->lessonServices->getLessons();
    }

    public function show()
    {
        return $this->lessonServices->getLesson();
    }
}
