<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
        // Retorna parking_id para a classe vagas
    }
}
