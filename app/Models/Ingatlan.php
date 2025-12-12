<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingatlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'leiras',
        'datum',
        'tehermentes',
        'ar',
        'kepUrl',
        'kategoria_id',
    ];

    public function kategoria()
    {
        return $this->belongsTo(Kategoria::class, 'kategoria_id');
    }
}
