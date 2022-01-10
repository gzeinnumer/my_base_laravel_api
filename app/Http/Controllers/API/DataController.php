<?php

namespace App\Http\Controllers\API;

use App\Models\Data;
use App\Models\EmptyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DataController extends BaseController
{

    public function insert(Request $r) {
        try {
            $input = array(
                'name' => 'required|string|unique:data'
            );

            $validator = Validator::make($r->all(), $input);

            if($validator->fails()){
                $apiResponse = $this->getApiResponse(0);
                // $apiResponse->message = $validator->getMessageBag();
                $apiResponse->message = "Data tidak boleh sama";
                return $this->responseFailed($apiResponse);
            }

            DB::beginTransaction();

            //type 1 $fillable
            Data::create($r->all());
            
            //type 2
            // $data = new Data();
            // $data->name = $r->name;
            // $data->save();

            DB::commit();
            $apiResponse = $this->getApiResponse(1);
            return $this->responseSuccess($apiResponse);
        }  catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseError($th);
        }
    }

    public function find() {
        try {
            $result = Data::find(1);
            
            return $this->finalResultSingle($result != null ? 1 : 0, 1, 0, $result);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function where() {
        try {
            $result = Data::where('name','like','%zein%')->get();
            
            $info = $this->generateInfoList($result);
            
            return $this->finalResultList($info->total > 0, 1, 0, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
