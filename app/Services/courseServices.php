<?php

namespace App\Services;

use App\Http\Requests\courseRequest;
use App\Models\courseManagment;
use App\Repository\courseRepository;
use App\Http\Controllers\api\apiResponse;

class courseServices
{
    use apiResponse;
    private $courseRepository;

    public function __construct(courseRepository $courseRepository)
    {
        $this->courseRepository=$courseRepository;
    }
    public function all()
    {
        $data=$this->courseRepository->all();
        return $this->apiResponse($data, 'Courses return successfully.',200);
    }

    public function show()
    {
        $data=$this->courseRepository->find();
        return $this->apiResponse($data, 'Course found successfully.',200);
    }

    public function store(courseRequest $request)
    {
        $data=$request->validated();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('categories'),$filename);
            $data['image']=$filename;
        }
        $this->courseRepository->create($data);
        return $this->apiResponse($data, 'Course created successfully.',200);
    }

    public function update(courseRequest $request)
    {
        $data=$request->validated();
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('categories'),$filename);
            $data['image']=$filename;
        }
        $find=$this->courseRepository->find();
        if($find)
        {
            $this->courseRepository->update($find);
        return $this->apiResponse($data, 'Course updated successfully.',200);
        }
        else{
            return $this->apiResponse($data, 'Course not found.',404);
        }
    }

    public function destroy()
    {
        $this->courseRepository->delete();
        return $this->apiResponse(null, 'Course deleted successfully.',200);
    }

   public function lessons()
   {
       $data=courseManagment::with('lessons')->find(request('id'));
       return $this->apiResponse($data, 'Lessons found successfully.',200);
   }

   public function quiz()
   {
       $data=courseManagment::with('quiz')->find(request('id'));
       return $this->apiResponse($data, 'Quiz found successfully.',200);
   }

}
