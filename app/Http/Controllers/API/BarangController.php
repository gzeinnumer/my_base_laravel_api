<?php

namespace App\Http\Controllers\API;

use App\Models\API\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangController extends BaseController
{
    public function insert(Request $r) {
        try {
            $input = array(
                'name' => 'required|string',
                'name2' => 'required|string'
            );

            $validator = Validator::make($r->all(), $input);

            if($validator->fails()){
                $apiResponse = $this->getApiResponse(0);
                $apiResponse->message = $validator->getMessageBag();
                return $this->responseFailed($apiResponse);
            }

            DB::beginTransaction();

            BarangModel::create($r->all());

            DB::commit();

            $apiResponse = $this->getApiResponse(1);
            return $this->responseSuccess($apiResponse);
        }  catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseError($th);
        }
    }

    public function all() {
        try {
            $result = BarangModel::all();

            return $this->toList($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function update(Request $r, $id) {
        try {
            $input = array(
                'name' => 'required|string',
                'name2' => 'required|string'
            );

            $validator = Validator::make($r->all(), $input);

            if($validator->fails()){
                $apiResponse = $this->getApiResponse(0);
                $apiResponse->message = $validator->getMessageBag();
                return $this->responseFailed($apiResponse);
            }

            DB::beginTransaction();

            $result = BarangModel::find($id);
            $result->name = $r->name;
            $result->name2 = $r->name2;
            $result->save();

            DB::commit();

            $apiResponse = $this->getApiResponse(1);
            return $this->responseSuccess($apiResponse);
        }  catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseError($th);
        }
    }

    public function delete($id) {
        try {
            $result = BarangModel::find($id);

            DB::beginTransaction();

            $result->delete();

            DB::commit();

            $apiResponse = $this->getApiResponse(1);
            return $this->responseSuccess($apiResponse);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function find($id) {
        try {
            $result = BarangModel::find($id);

            return $this->toObject($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
