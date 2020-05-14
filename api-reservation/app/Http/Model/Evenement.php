<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'date',
    ];

    public function lieu()
    {
        return $this->belongsTo('App\Lieu');
    }

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function participants()
    {
        return $this->belongsToMany('App\User');
    }

}
