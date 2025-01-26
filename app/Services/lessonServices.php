<?php

namespace App\Services;

use App\Http\Requests\lessonRequest;
use App\Models\lessonManagment;
use App\Repository\lessonRepository;
use App\Http\Controllers\api\apiResponse;

class lessonServices
{
    use apiResponse;
    private $lessonRepository;

    public function __construct(lessonRepository $lessonRepository)
    {
        $this->lessonRepository=$lessonRepository;
    }

    public function createLesson(lessonRequest $request)
    {
        $data=$request->validated();
        $lesson=$this->lessonRepository->create($data);
        return $this->apiResponse($lesson, 'Lesson created successfully',200);
    }

    public function updateLesson(lessonRequest $request)
    {
        $data=$request->validated();
        $data=$this->lessonRepository->find();
        if(!$data){
            return $this->apiResponse(null, 'Lesson not found',404);
        }
        else{

        $lesson=$this->lessonRepository->update($data);
        return $this->apiResponse($lesson, 'Lesson updated successfully',200);
        }
    }

    public function deleteLesson(){
        $data=$this->lessonRepository->find();
        if(!$data){
            return $this->apiResponse(null, 'Lesson not found',404);
        }
        else{
        $lesson=$this->lessonRepository->delete();
        return $this->apiResponse($lesson, 'Lesson deleted successfully',200);
        }
    }

    public function getLessons(){
        $lesson=$this->lessonRepository->all();
        return $this->apiResponse($lesson, 'Lessons fetched successfully',200);
    }

    public function getLesson(){
        $lesson=$this->lessonRepository->find();
        return $this->apiResponse($lesson, 'Lesson fetched successfully',200);
    }
}
