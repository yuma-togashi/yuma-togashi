<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Follow;


class Post extends Model
{
    //
    protected $fillable = [
      'posts', 'user_id','id'
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getTimelines(Int $follow_ids)
    {
        return $this->where('user_id',$follow_ids)->orderBy('created_at','DESC')->get();
    }

    public function getFollowerTimelines(Array $follower_ids)
    {
        return $this->whereIn('user_id',$follower_ids)->orderBy('created_at','DESC')->first();
    }



}
