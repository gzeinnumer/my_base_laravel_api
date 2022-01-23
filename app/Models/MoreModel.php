<?php

namespace App\Models;

use App\MyApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoreModel extends Model
{
    use HasFactory;
    protected $table = "more";
    protected $casts = MyApp::datetime;
    
    public function paging(){
        return $this->belongsTo(PagingModel::class, 'id_paging', 'id');
    }
}
