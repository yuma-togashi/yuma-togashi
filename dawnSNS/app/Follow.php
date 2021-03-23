<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //

    public function user()
    {
        return $this->hasMany(User::class,  'id', 'follow', 'follower');
    }





    protected $fillable = [
        'follow', 'follower',
    ];

    public $timestamps = false;
}
