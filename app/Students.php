<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'StudentName', 'StudentGroup', 'StudentSuper','StudentPoints',
    ];

    public function user()
    {
       return $this->belongsTo('\App\User');
    }
    public function group()
    {
       return $this->belongsTo('\App\Groups','StudentGroup');
    }

}
