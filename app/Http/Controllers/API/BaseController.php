<?php

namespace App\Http\Controllers\API;

use stdClass;

class BaseController extends BaseControllerSetting
{
    protected function initParams($total, $perPage) {
        $totalPage = $total/$perPage;
        $isMore = $totalPage > (int) $totalPage;
        return (int) $totalPage + ($isMore?1:0);
    }

    public function generateInfoList($data) {
        $info = new stdClass();
        $info->total = count($data) != null ? count($data) : null;
        $info->totalPage = null;
        $info->page = null;
        $info->next = null;
        $info->prev = null;

        return $info;
    }

    public function generateInfoPagination($dataParsing, $limit, $page) {
        $count = $dataParsing->paginate()->total();
        $totalPage = $this->initParams($count, $limit);
        $next = $page+1;
        $prev = $page-1;
        
        $info = new stdClass();
        $info->total = $count;
        $info->totalPage = $totalPage;
        $info->page = (int) $page;

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
