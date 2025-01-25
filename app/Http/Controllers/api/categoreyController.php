<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\categoreyRequest;
use App\Services\categoreyServices;

class categoreyController
{
    private $categoreyService;

    public function __construct(CategoreyServices $categoreyService)
    {
        $this->categoreyService = $categoreyService;
    }
    public function index()
    {
        return $this->categoreyService->index();
    }

    public function store(categoreyRequest $request)
    {
        return $this->categoreyService->store($request);
    }

    public function update(categoreyRequest $request)
    {
        return $this->categoreyService->update($request);
    }

    public function destroy()
    {
        return $this->categoreyService->destroy();
    }

    public function show()
    {
        return $this->categoreyService->show();
    }

    public function courses()
    {
        return $this->categoreyService->courses();
    }
}
