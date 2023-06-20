<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class makul extends Model
{
    use HasFactory;
    public $table = "makul"; 
    protected $primaryKey = "id"; 
    public $incrementing=false; 
    protected $keyType="string";
}
