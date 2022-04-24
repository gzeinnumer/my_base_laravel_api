<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\BarangResource;
use App\Models\API\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BarangController extends BaseController
{
    /*
    {
        "name" : "data 1"
    }
    */
    //localhost:8000/api/barang/insert
    public function insert(Request $r)
    {
        try {
            $input = array(
                'name' => 'required|string|min:1'
            );

            $validator = Validator::make($r->all(), $input);

            if ($validator->fails()) {
                $apiResponse = $this->getApiResponse(0);
                $apiResponse->message = $validator->getMessageBag();
                return $this->responseFailed($apiResponse);
            }

            DB::beginTransaction();

            //type 1
            // BarangModel::create($r->all());

            //type 2
            // $result = new ProductModel();
            // $result->name = $r->name;
            // $result->trans_date = $r->trans_date;
            // $result->volume = $r->volume;
            // $result->save();

            //type 3
            $result = new BarangModel();
            foreach ($r->all() as $key => $value) {
                $result->$key = $value;
            }
            // $result->column = "";
            $result->save();

            DB::commit();

            $apiResponse = $this->getApiResponse(1);
            return $this->responseSuccess($apiResponse);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseError($th);
        }
    }

    //localhost:8000/api/barang/all
    public function all()
    {
        try {
            $result = BarangModel::all();

            return $this->toList(BarangResource::collection($result), 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    //http://localhost:8000/api/barang/paging?limit=10&page=1&start_date=2023-01-01&end_date=2023-01-01
    public function paging(Request $r)
    {
        try {
            $limit = $r->limit ? $r->limit : 10;
            $page = $r->page ? $r->page : 1;
            $start_date = $r->start_date;
            $end_date = $r->end_date;

            $query = DB::table('barang');

            if ($start_date) {
                $query = $query->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
            }

            $dataParsing = $query;

            return $this->toPaging(
                1,
                $dataParsing,
                $limit,
                $page
            );
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    /*
    {
        "name" : "Data 1 Update"
    }
    */
    //localhost:8000/api/barang/update/{{id}}
    public function update(Request $r, $id)
    {
        try {
            $input = array(
                'name' => 'required|string|min:1'
            );

            $validator = Validator::make($r->all(), $input);

            if ($validator->fails()) {
                $apiResponse = $this->getApiResponse(0);
                $apiResponse->message = $validator->getMessageBag();
                return $this->responseFailed($apiResponse);
            }

            DB::beginTransaction();

            $result = BarangModel::find($id);
            $result->name = $r->name;
            $result->save();

            DB::commit();

            $apiResponse = $this->getApiResponse(1);
            return $this->responseSuccess($apiResponse);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseError($th);
        }
    }

    //localhost:8000/api/barang/delete/{{id}}
    public function delete($id)
    {
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

    //localhost:8000/api/barang/find/{{id}}
    public function find($id)
    {
        try {
            $result = BarangModel::find($id);

            return $this->toObject(new BarangResource($result), 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
