<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address'
    ];

    public function evenements()
    {
        return $this->hasMany('App\Evenement');
    }

}
