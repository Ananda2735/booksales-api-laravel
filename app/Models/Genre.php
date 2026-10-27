<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public static function getGenres(): array
    {
        return[
            
            ['id' => 1, 'name' => 'Fiksi'],
            ['id' => 2, 'name' => 'Romantis'],
            ['id' => 3, 'name' => 'Misteri'],
            ['id' => 4, 'name' => 'Pendidikan'],
            ['id' => 5, 'name' => 'Fantasi'],
        ];
    }
}