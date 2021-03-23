<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $remember_token=false;

    public function followsCount()
    {
        $id = Auth::id();
        $followerCount = \DB::table('follows')->where('follower', $id)->count();
        return $followerCount;
    }

    public function followersCount()
    {
        $id = Auth::id();
        $followCount = \DB::table('follows')->where('follow', $id)->count();
        return $followCount;
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'follow', 'follower');
    }

    public function followers()
    {
        return $this->belongsToMany(Follow::class, 'follows', 'follow', 'follower');
    }

    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('follower',$user_id)->exists();
    }

    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('follow', $user_id)->exists();
    }
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }
}
