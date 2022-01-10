<?php

namespace App\Models;

use App\MyApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class More extends Model
{
    use HasFactory;
    protected $table = "more";
    protected $casts = MyApp::datetime;
}
