<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FollowsController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('auth');
    }

    //フォロー処理
    public function store($id)
    {
      \Auth::user()->follow($id);
      return back();
    }

    //フォロー外す処理
    public function destroy($id)
    {
      \Auth::user()->unfollow($id);
      return back();
    }

    public function followList(){
      $id = Auth::id();

      $timelines = DB::table('users')
      ->Join('posts','posts.user_id','=','users.id')
      ->Join('follows','follows.follower','=','users.id')
      ->where('follows.follow',$id)
      ->select('users.id','users.username','users.images','posts.user_id','posts.posts','posts.created_at','follows.follower')
      ->orderBy('posts.created_at','desc')
      ->get();


      return view('follows.followList',[ 'timelines' => $timelines]);
    }

    public function followerList(Post $post){
      $id = Auth::id();

      $timelines = DB::table('users')
      ->Join('posts','posts.user_id','=','users.id')
      ->Join('follows','follows.follow','=','users.id')
      ->where('follows.follower',$id)
      ->select('users.id','users.username','users.images','posts.user_id','posts.posts','posts.created_at','follows.follower')
      ->orderBy('posts.created_at','desc')
      ->get();
      return view('follows.followerList' , [ 'timelines' => $timelines]);
    }



}
