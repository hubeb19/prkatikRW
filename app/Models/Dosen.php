<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    public $table = "dosen"; 
    protected $primaryKey = "id"; 
    public $incrementing=false; 
    protected $keyType="string";
}
