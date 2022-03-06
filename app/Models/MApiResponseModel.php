<?php

namespace App\Models;

use App\MyApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MApiResponseModel extends Model
{
    use HasFactory;
    protected $table = 'm_api_response';
    protected $fillable = ['id', 'method', 'end_point', 'response_number', 'title', 'message', 'created_at', 'updated_at'];
    protected $casts = MyApp::datetime;
}
