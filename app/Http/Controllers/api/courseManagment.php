<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\courseRequest;
use Illuminate\Http\Request;
use App\Services\courseServices;

class courseManagment extends Controller
{
    private $courseService;

    public function __construct(courseServices $courseServices)
    {
        $this->courseService=$courseServices;
    }

    public function index()
    {
        return $this->courseService->all();
    }

    public function show()
    {
        return $this->courseService->show();
    }

    public function store(courseRequest $request)
    {
        return $this->courseService->store($request);
    }

    public function update(courseRequest $request)
    {
        return $this->courseService->update($request);
    }

    public function destroy()
    {
        return $this->courseService->destroy();
    }

    public function lessons()
    {
        return $this->courseService->lessons();
    }

    public function quiz()
    {
        return $this->courseService->quiz();
    }
}
