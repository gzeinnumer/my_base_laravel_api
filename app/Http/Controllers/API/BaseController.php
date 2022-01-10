<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use stdClass;

class BaseController extends BaseControllerSetting
{

    protected function initParams($total, $perPage){
        $totalPage = $total/$perPage;
        $isMore = $totalPage > (int) $totalPage;
        return (int) $totalPage + ($isMore?1:0);
    }

    public function generateInfo($data)
    {
        $info = new stdClass();
        $info->count = count($data) != null ?count($data):null;
        $info->totalPage = null;
        $info->page = null;
        $info->next = null;
        $info->prev = null;

        return $info;
    }

    public function generateInfoPagination($dataParsing, $limit, $page)
    {
        $count = $dataParsing->paginate()->total();
        $totalPage = $this->initParams($count, $limit);
        $info = new stdClass();
        $next = $page+1;
        $prev = $page-1;
        $info->count = $count;
        $info->totalPage = $totalPage;
        $info->page = (int)$page;

        if($page>$totalPage || $page <= 0){
            $info->next = null;
            $info->prev = null;

            return $info;
        } else{
            $info->next = $page == $totalPage ? null: $next;
            $info->prev = $prev == 0 ? null : $prev;
            
            return $info;
        }
    }
}
