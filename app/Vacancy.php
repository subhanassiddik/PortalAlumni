<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{


    protected $fillable =[
        'title','slug','description','vacancyable_id','vacancyable_type'
    ];

    // protected $guarded=[];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
