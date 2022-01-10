<?php

namespace App\Http\Controllers\API;

use App\Models\EmptyModel;
use App\Models\More;
use App\Models\One;
use App\Models\Paging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagingController extends BaseController
{
    public function query_test(Request $r)
    {
        return $r->all();
    }

    public function all()
    {
        try {
            $result = Paging::all();

            $info = $this->generateInfo($result);
            
            $apiResponse = $this->getApiResponse(1);
            return $this->responseSucessList($apiResponse, $result, $info);
        } catch (\Throwable $th) {
            $apiResponse = $this->getApiResponse(-1);
            $apiResponse->message = $th->getMessage();
            return $this->responseError($apiResponse);
        }
    }

    public function db()
    {
        try {
            $result = DB::select("select * from paging");

            $info = $this->generateInfo($result);
            
            $apiResponse = $this->getApiResponse(1);
            return $this->responseSucessList($apiResponse, $result, $info);
        } catch (\Throwable $th) {
            $apiResponse = $this->getApiResponse(-1);
            $apiResponse->message = $th->getMessage();
            return $this->responseError($apiResponse);
        }
    }

    public function join()
    {
        try {
            $result = DB::select("
                select p.*, m.more from paging p 
                left join more m on m.id_paging=p.id 
            ");
            
            $res = array();
            foreach($result as $d){
                $temp = $d;
                $temp->detail = More::find(['id_paging' => $d->id]);
                $res[] = $temp;
            }

            $info = $this->generateInfo($result);
            
            $apiResponse = $this->getApiResponse(1);
            return $this->responseSucessList($apiResponse, $res, $info);
        } catch (\Throwable $th) {
            $apiResponse = $this->getApiResponse(-1);
            $apiResponse->message = $th->getMessage();
            return $this->responseError($apiResponse);
        }
    }

    public function joinElo()
    {
        try {
            $result = Paging::with('more', 'one')->get();

            $info = $this->generateInfo($result);
            
            $apiResponse = $this->getApiResponse(1);
            return $this->responseSucessList($apiResponse, $result, $info);
        } catch (\Throwable $th) {
            $apiResponse = $this->getApiResponse(-1);
            $apiResponse->message = $th->getMessage();
            return $this->responseError($apiResponse);
        }
    }

    public function joinEloBelongTo()
    {
        try {
            $result = One::with('paging')->get();

            $info = $this->generateInfo($result);
            
            $apiResponse = $this->getApiResponse(1);
            return $this->responseSucessList($apiResponse, $result, $info);
        } catch (\Throwable $th) {
            $apiResponse = $this->getApiResponse(-1);
            $apiResponse->message = $th->getMessage();
            return $this->responseError($apiResponse);
        }
    }

    public function empty()
    {
        try {
            $result = EmptyModel::all();

            $info = $this->generateInfo($result);
            
            $apiResponse = $this->getApiResponse(1);
            return $this->responseSucessList($apiResponse, $result, $info);
        } catch (\Throwable $th) {
            $apiResponse = $this->getApiResponse(-1);
            $apiResponse->message = $th->getMessage();
            return $this->responseError($apiResponse);
        }
    }

    public function tc()
    {
        try {
            $result = EmptyModel::all();

            $info = $this->generateInfo($result);
            
            //sengaja dibuat error
            $apiResponse = null;
            return $this->responseSucessList($apiResponse, $result, $info);
        } catch (\Throwable $th) {
            $apiResponse = $this->getApiResponse(-1);
            $apiResponse->message = $th->getMessage();
            return $this->responseError($apiResponse);
        }
    }

    public function paging(Request $r)
    {
        try {
            $limit = $r->limit ? $r->limit : 10;
            $page = $r->page;
            $start_date = $r->start_date;
            $end_date = $r->end_date;

            $query = DB::table('much_data');

            $dataParsing = $query;
            
            $result = $dataParsing->paginate($limit, ['*'], 'page', $page)->items();

            $info = $this->generateInfoPagination($dataParsing, $limit, $page);
            
            $apiResponse = $this->getApiResponse(1);
            return $this->responseSucessList($apiResponse, $result, $info);
        } catch (\Throwable $th) {
            $apiResponse = $this->getApiResponse(-1);
            $apiResponse->message = $th->getMessage();
            return $this->responseError($apiResponse);
        }
    }
}
