<?php

namespace App\trait;

trait apiResponse
{
    public function sendResponse($data=null, $message=null,$status=null)
    {
        $array=[
            'data'=>$data,
            'message'=>$message,
            'status'=>$status
        ];

        return response($array);
    }
}
