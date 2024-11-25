<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    /** @use HasFactory<\Database\Factories\MaisonFactory> */
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
