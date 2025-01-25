<?php

namespace App\Http\Controllers\API\trait;

trait apiResponseUser
{
    public function apiResponse($result=null, $message=null,$status=null)
    {
        $array = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response($array);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
