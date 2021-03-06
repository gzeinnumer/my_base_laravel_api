<?php

namespace App\Models\API;

use App\MyApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $fillable = ["name", "created_at", "updated_at"];
    protected $casts = MyApp::datetime;
}
