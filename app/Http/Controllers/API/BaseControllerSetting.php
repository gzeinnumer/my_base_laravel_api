<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use stdClass;

class BaseControllerSetting extends Controller
{
    protected $page = 1;
    protected $limit = 10;

    public function getApiResponse($code) {
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

    protected function initResponse($status, $title, $message, $data, $info) {
        return [
            'status' => $status,
            'title' => $title,
            'message' => $message,
            'info' => $info,
            'data' => $data,
        ];
    }

    protected function responseList($apiResponse, $result, $info) {
        $response = $this->initResponse(
            $info->total > 0 ? 1: 0,
            $apiResponse->title,
            $apiResponse->message,
            $result,
            $info
        );
        return response()->json($response, 200);
    }

    protected function responseSingle($apiResponse, $result) {
        $response = $this->initResponse(
            1,
            $apiResponse->title,
            $apiResponse->message,
            $result,
            null
        );
        return response()->json($response, 200);
    }

    protected function responseSuccess($apiResponse) {
        $response = $this->initResponse(
            1,
            $apiResponse->title,
            $apiResponse->message,
            null,
            null
        );
        return response()->json($response, 200);
    }

    public function responseFailed($apiResponse) {
        $response = $this->initResponse(
            0,
            $apiResponse->title,
            $apiResponse->message,
            null,
            null,
        );
        return response()->json($response, 200);
    }

    public function responseError($th) {
        $apiResponse = $this->getApiResponse(-1);
        $apiResponse->message = $th->getMessage();

        $response = $this->initResponse(
            -1,
            $apiResponse->title,
            $apiResponse->message,
            null,
            null,
        );
        return response()->json($response, 500);
    }

    public function finalResultList($total, $codeSuccess, $codeFailed, $result, $info) {
        if($total){
            $apiResponse = $this->getApiResponse($codeSuccess);
            return $this->responseList($apiResponse, $result, $info);
        } else{
            $apiResponse = $this->getApiResponse($codeFailed);
            return $this->responseFailed($apiResponse);
        }
    }

    public function finalResultSingle($total, $codeSuccess, $codeFailed, $result) {
        if($total){
            $apiResponse = $this->getApiResponse($codeSuccess);
            return $this->responseSingle($apiResponse, $result);
        } else{
            $apiResponse = $this->getApiResponse($codeFailed);
            return $this->responseFailed($apiResponse);
        }
    }

    public function finalResultPaging($codeSuccess, $result, $info) {
        $apiResponse = $this->getApiResponse($codeSuccess);
        return $this->responseList($apiResponse, $result, $info);
    }
}
