<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    //プロフィール
    public function profile(){

        $user = Auth::user();

        return view('users.profile',['user' => $user]);
    }

    //マイプロフィール編集
    public function edit()
    {

      return view('users.edit', ['user' => $user ]);
    }

    //マイプロフィール編集
    public function update(Request $request)
    {
      $rules = [
        'username' => 'required|string|max:12',
        'mail' => 'required|string|min:4|email',
        'bio' => 'string|max:200|nullable',
        'images' => 'nullable',
        // 'images' => 'image|mimes:jpg,jpeg,png,svg,bmp'
      ];

      $this->validate($request, $rules);

      $user = Auth::user();
      $user->username = $request->input('username');
      $user->mail = $request->input('mail');
      $user->bio = $request->input('bio');


      $user->images = $request->input('images');
      $images = $request->input('images');

      $message='できてるよ';

      if(!isset($images)){
        $user_img = User::query()
          ->where('id', Auth::id())
          ->value('images');
          // dd($user_img);
        $user->images = $user_img;
        $user->save();
      }
      $user->save();
      //リダイレクト
      return redirect()->back()->with('status', 'プロフィールを更新しました');
    }

    public function search(Request $request){
        $users = Auth::user();

        //if($request->filled('searchInput'))
        //{
        $search = $request->input('search');
          \Log::debug($search);
        $query = User::query();
        if(!empty($search)){
            $query -> where('username','LIKE',"%$search%");
        }
        $users = $query->get();

        return view('users.search' , compact('users','search'));
        //}
        // elseif($request->filled('follow'))
        // {
        //     $followId = $request->input('follow');

        //     Follow::create([
        //         'follow' => $followId,
        //         'follower' => $id,
        //     ]);

        //     return redirect('/search');
        // }
        // elseif($request->filled('unfollow'))
        // {
        //     $unfollowId = $request->input('unfollow');

        //     Follow::where('follow',$unfollowId)->where('follower',$id)->delete();

        //     return redirect('/search');
        // }

    }



    public function follow($id)
    {
        $follower = Auth::user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if(!$is_following) {
            $follower->follow($id);
            return back();
        }
    }


    // フォロー解除
    public function unfollow($id)
    {
        $follower = Auth::user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($id);
            return back();
        }
    }



}
