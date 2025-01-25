<?php

namespace App\Http\Controllers\api;

trait apiResponse
{
    public function apiResponse($data=null, $message=null,$status=null)
    {
        $array=[
            'message'=>$message,
            'status'=>$status,
            'data'=>$data
        ];

        return response($array);
    }
}
