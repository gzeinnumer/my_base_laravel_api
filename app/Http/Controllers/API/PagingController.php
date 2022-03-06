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

    /*
    {
        "status": 1,
        "title": "Perhatian",
        "message": "Success",
        "info": {
            "total": 3
        },
        "data": [ ... ]
    }
    */
    //////////////////////////////////////////////////////////////////////ALL
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

    public function allSimple() {
        try {
            $result = PagingModel::all();
            // $result = Paging::select()->where(['id' => 0])->get();

            return $this->toList($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    /*
    {
        "status": 1,
        "title": "Perhatian",
        "message": "Success",
        "info": {
            "total": 3
        },
        "data": [ ... ]
    }
    */
    //////////////////////////////////////////////////////////////////////DB
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

    public function dbSimple() {
        try {
            $result = DB::select("select * from paging");
            // $result = DB::select("select * from paging where id=0");

            return $this->toList($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    /*
    {
        "status": 1,
        "title": "Perhatian",
        "message": "Success",
        "info": {
            "total": 3
        },
        "data": [ ... ]
    }
    */
    //////////////////////////////////////////////////////////////////////JOIN DB
    public function joinDB() {
        try {
            $result = DB::select("
                select p.*, m.more from paging p 
                left join more m on m.id_paging=p.id;
            ");
            // $result = DB::select("
            //     select p.*, m.more from paging p 
            //     left join more m on m.id_paging=p.id
            //     where p.id = 0;
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

    public function joinDBSimple() {
        try {
            $result = DB::select("
                select p.*, m.more from paging p 
                left join more m on m.id_paging=p.id;
            ");
            // $result = DB::select("
            //     select p.*, m.more from paging p 
            //     left join more m on m.id_paging=p.id
            //     where p.id = 0;
            // ");
            
            $res = array();
            foreach($result as $d){
                $temp = $d;
                $temp->detail = MoreModel::where(['id_paging' => $d->id])->get();
                $res[] = $temp;
            }

            return $this->toList($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    /*
    {
        "status": 1,
        "title": "Perhatian",
        "message": "Success",
        "info": {
            "total": 3
        },
        "data": [ ... ]
    }
    */
    //////////////////////////////////////////////////////////////////////JOIN ELO
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

    public function joinEloSimple() {
        try {
            $result = PagingModel::with('more', 'one')->get();
            // $result = Paging::with('more', 'one')->where(['paging.id' => 0])->get();

            return $this->toList($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    /*
    {
        "status": 1,
        "title": "Perhatian",
        "message": "Success",
        "info": {
            "total": 3
        },
        "data": [ ... ]
    }
    */
    //////////////////////////////////////////////////////////////////////JOIN ELO BELONG
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

    public function joinEloBelongToSimple() {
        try {
            $result = OneModel::with('paging')->get();
            // $result = One::with('paging')->where(['one.id' => 0])->get();

            return $this->toList($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    /*
    {
        "status": 0,
        "title": "Perhatian",
        "message": "Failed"
    }
    */
    //////////////////////////////////////////////////////////////////////EMPTY
    public function empty() {
        try {
            $result = EmptyModel::all();

            $info = $this->generateInfoList($result);
            
            return $this->finalResultList($info->total > 0, 1, 0, $result, $info);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    public function emptySimple() {
        try {
            $result = EmptyModel::all();

            return $this->toList($result, 1, 0);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }

    /*
    {
        "status": -1,
        "title": "Perhatian",
        "message": "Attempt to read property \"title\" on null"
    }
    */
    //////////////////////////////////////////////////////////////////////TC
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

    /*
    {
        "status": 1,
        "title": "Perhatian",
        "message": "Success",
        "info": {
            "total": 21,
            "totalPage": 3,
            "page": 2,
            "next": 3,
            "prev": 1
        },
        "data": [ ... ]
    }
    */
    //////////////////////////////////////////////////////////////////////PAGING
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

    public function pagingSimple(Request $r) {
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

            $dataParsing = $query;

            return $this->toPaging(1, $dataParsing, $limit, $page);
        } catch (\Throwable $th) {
            return $this->responseError($th);
        }
    }
}
