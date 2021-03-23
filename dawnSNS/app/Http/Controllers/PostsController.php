<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
        $posts = User::query()
      ->join('posts','user_id', '=', 'users.id')
      ->orderBy('posts.created_at', 'desc')
      ->get();
      return view('posts.index', ['posts' => $posts]);
    }

    // 新規ツイート入力
    public function create(Request $request)
    {
      $posts = new Post();
      $posts->user_id = Auth::user() ->id;
      $posts->posts = $request->input('newPost');
      $posts->save();

      return redirect('/top');
    }

     //ツイート編集処理(topページ)
     public function updateForm($id)
    {
        $post = \DB::table('posts')
            ->where('id', $id)
            ->first();
        return view('posts.index', compact('posts'));

    }

    public function update(Request $request)
    {
      $id = $request->input('id');
      \Log::debug($id);
      $up_post = $request->input('upPost');
      \Log::debug($up_post);

      \DB::table('posts')
      ->where('id', $id)
      ->update(
        ['posts' => $up_post]
      );

      return redirect('/top');
    }


    //ツイート削除
    public function delete($id)
    {
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }



}
