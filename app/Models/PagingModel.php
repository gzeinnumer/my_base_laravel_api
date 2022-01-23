<?php

namespace App\Models;

use App\MyApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagingModel extends Model
{
    use HasFactory;
    protected $table = "paging";
    protected $fillable = ['name','detail'];
    protected $casts = MyApp::datetime;
    
    public function more(){
        return $this->hasMany(MoreModel::class, 'id_paging', 'id');
    }
    
    public function one(){
        return $this->hasOne(OneModel::class, 'id_paging', 'id');
    }
}
