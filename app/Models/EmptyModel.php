<?php

namespace App\Models;

use App\MyApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmptyModel extends Model
{
    use HasFactory;
    protected $table = "empty";
    protected $casts = MyApp::datetime;
    protected $fillable = ['name'];
}
