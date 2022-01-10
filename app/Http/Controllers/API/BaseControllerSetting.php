<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;

class BaseControllerSetting extends Controller
{
    protected $page = 1;
    protected $limit = 10;

    public function getApiResponse($code)
    {
        $apiResponse = new stdClass();
        $apiResponse->title = "Perhatian";
        // $apiResponse->message = "pesan";
        if($code == 1){
            $apiResponse->message = "Success";
        } else if($code == 0){
            $apiResponse->message = "Failed";
        } else if($code == -1){
            $apiResponse->message = "Error";
        }

        return $apiResponse;
    }

    protected function initResponse($status, $title, $message, $data, $info){
        return [
            'status' => $status,
            'title' => $title,
            'message' => $message,
            'info' => $info,
            'data' => $data,
        ];
    }

    protected function responseSucessList($apiResponse, $result, $info){
        $response = $this->initResponse(
            $info != null ? ($info->count > 0 ? 1 : 0) : 1,
            $apiResponse->title,
            $apiResponse->message,
            count($result)>0?$result:null,
            $info
        );
        return response()->json($response, 200);
    }

    protected function responseSucessSingle($apiResponse, $result){
        $response = $this->initResponse(
            1,
            $apiResponse->title,
            $apiResponse->message,
            $result,
            null
        );
        return response()->json($response, 200);
    }

    public function responseFailed($apiResponse){
        $response = $this->initResponse(
            0,
            $apiResponse->title,
            $apiResponse->message,
            null,
            null,
        );
        return response()->json($response, 200);
    }

    public function responseError($apiResponse){
        $response = $this->initResponse(
            -1,
            $apiResponse->title,
            $apiResponse->message,
            null,
            null,
        );
        return response()->json($response, 200);
    }
}
