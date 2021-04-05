<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugare extends Model
{
    protected $table ='Lugares';
    
    protected $fillable = ['nombre', 'estado'];

    use HasFactory;


}
