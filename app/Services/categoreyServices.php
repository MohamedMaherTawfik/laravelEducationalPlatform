<?php

namespace App\Services;

use App\Http\Requests\categoreyRequest;
use App\Models\categorey;
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
        if($request->hasFile('image')) {
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('categories'),$filename);
            $data['image']=$filename;
        }
        $this->categoreyRepository->find()->update($data);
        return $this->apiResponse($data, 'Category updated successfully.',200);
    }

    public function destroy()
    {
        $category=$this->categoreyRepository->find();
        if(!$category) {
            return $this->apiResponse([], 'Category not found.',404);
        }
        $category->delete();
        return $this->apiResponse([], 'Category deleted successfully.',200);
    }

    public function show()
    {
        $data=$this->categoreyRepository->find();
        return $this->apiResponse($data, 'Category found successfully.',200);
    }

    public function courses()
    {
        $data=categorey::with('courseManagment')->find(request('id'));
        return $this->apiResponse($data, 'Courses found successfully.',200);
    }
}
