<?php

namespace App\Services;

use App\Http\Requests\categoreyRequest;
use App\Repository\categoreyRepository;
use App\Http\Controllers\api\apiResponse;

class categoreyServices
{
    use apiResponse;
    private $categoreyRepository;

    public function __construct(categoreyRepository $categoreyRepository)
    {
        $this->categoreyRepository = $categoreyRepository;
    }

    public function index()
    {
        $data=$this->categoreyRepository->all();
        return $this->apiResponse($data, 'Categories return successfully.',200);
    }

    public function store(categoreyRequest $request)
    {
        $data=$request->validated();
        // if there a file store it in categories folder inside public
        if($request->hasFile('image')) {
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('categories'),$filename);
            $data['image']=$filename;
        }
        $this->categoreyRepository->create($data);
        return $this->apiResponse($data, 'Category created successfully.',200);
    }

    public function update(categoreyRequest $request)
    {
        $data=$request->validated();
        $this->categoreyRepository->update($data);
        return $this->apiResponse($data, 'Category updated successfully.',200);
    }

    public function destroy()
    {
        $this->categoreyRepository->delete();
        return $this->apiResponse([], 'Category deleted successfully.',200);
    }

    public function show()
    {
        $data=$this->categoreyRepository->find();
        return $this->apiResponse($data, 'Category found successfully.',200);
    }

    public function courses()
    {
        $data=$this->categoreyRepository->find();
        $data=$data->courses;
        return $this->apiResponse($data, 'Courses found successfully.',200);
    }
}
