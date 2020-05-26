<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $fillable = [
        'GroupName', 'GroupSuper', 'GroupPoints',
    ];

    public function user()
    {
       return $this->belongsTo('\App\User');
    }

    public function students()
    {
       return $this->hasMany('\App\Students','StudentSuper');
    }

}
