<?php

namespace App\Http\Controllers\API;

use App\Models\EmptyModel;
use App\Models\MoreModel;
use App\Models\OneModel;
use App\Models\PagingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagingController extends BaseController
{
    public function query_test(Request $r) {
        return $r->all();
    }

    public function all() {
        try {
            $result = PagingModel::all();
            // $result = Paging::select()->where(['id' => 0])->get();

            $info = $this->generateInfoList($result);

            return $this->finalResultList($info->total > 0, 1, 0, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function db() {
        try {
            $result = DB::select("select * from paging");
            // $result = DB::select("select * from paging where id=0");

            $info = $this->generateInfoList($result);
            
            return $this->finalResultList($info->total > 0, 1, 0, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function joinDB() {
        try {
            $result = DB::select("
                select p.*, m.more from paging p 
                left join more m on m.id_paging=p.id
                group by p.id;
            ");
            // $result = DB::select("
            //     select p.*, m.more from paging p 
            //     left join more m on m.id_paging=p.id
            //     where p.id = 0
            // ");
            
            $res = array();
            foreach($result as $d){
                $temp = $d;
                $temp->detail = MoreModel::where(['id_paging' => $d->id])->get();
                $res[] = $temp;
            }

            $info = $this->generateInfoList($result);
            
            return $this->finalResultList($info->total > 0, 1, 0, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function joinElo() {
        try {
            $result = PagingModel::with('more', 'one')->get();
            // $result = Paging::with('more', 'one')->where(['paging.id' => 0])->get();

            $info = $this->generateInfoList($result);
            
            return $this->finalResultList($info->total > 0, 1, 0, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function joinEloBelongTo() {
        try {
            $result = OneModel::with('paging')->get();
            // $result = One::with('paging')->where(['one.id' => 0])->get();

            $info = $this->generateInfoList($result);
            
            return $this->finalResultList($info->total > 0, 1, 0, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function empty() {
        try {
            $result = EmptyModel::all();

            $info = $this->generateInfoList($result);
            
            return $this->finalResultList($info->total > 0, 1, 0, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function tc() {
        try {
            $result = EmptyModel::all();

            $info = $this->generateInfoList($result);
            
            //sengaja dibuat error
            $apiResponse = null;
            return $this->responseList($apiResponse, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function paging(Request $r) {
        try {
            $limit = $r->limit ? $r->limit : 10;
            $page = $r->page ? $r->page : 1;
            $start_date = $r->start_date;
            $end_date = $r->end_date;

            $query = DB::table('much_data');

            if ($start_date) {
                $query = $query->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
            }

            // $query = $query->where(['id'=>0]);

            $dataParsing = $query;

            $result = $dataParsing->paginate($limit, ['*'], 'page', $page)->items();

            $info = $this->generateInfoPagination($dataParsing, $limit, $page);
            
            return $this->finalResultPaging(1, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
