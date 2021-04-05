<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = ['entry_time', 'exit_time', 'price_total', 'parking_id', 'client_id','bahia_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
        //Retorna um registro de chave estrangeira (1 pra N) do tipo client_id
    }
    
    public function bahia()
    {
        return $this->belongsTo(Bahia::class);
        //Retorna um registro de chave estrangeira (1 pra N) do tipo client_id
    }
    
    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }
}
