@extends('layouts.login')

@section('content')

<div class="search-form">
  @if(isset($search))
      <p class="search-word">検索ワード：{{ $search }}</p>
  @endif
  {!! Form::open(['url' => '/search', 'method' => 'get', 'class' => 'search-input']) !!}
  {!! Form::input('text', 'search', null,['required','placeholder' => 'ユーザー名', 'class'=>'search-input-form'] )!!}
    <button type="submit" class="btn-search">
      <i class="fas fa-search"></i>
    </button>
  {!! Form::close() !!}
</div>

<!-- 検索結果一覧を表示 -->
<div class="search-users">
  @foreach($users as $user)
    @if(!(Auth::user()->id==$user->id))
    <div class="search-user">
      <a href="/profile/{{ $user -> id}}">
        <img src="images/{{ $user -> images}}" alt="user-images" class="img_logo">
      </a>
      <p class="search-username">{{ $user -> username}}</p>
      @if(Auth::user()->isFollowing($user->id))
      <form action="{{route('unfollow', $user->id)}}" method = "post">
      @csrf
      @method('DELETE')
        <button type="submit" class="unfollow-btn">フォローをはずす</button>
      </form>
      @else
      <form action="{{ route('follow', $user->id) }}" method="post">
      @csrf
        <button type="submit" class="follow-btn">フォローする</button>
      </form>
      @endif
    </div>
    @endif
  @endforeach
</div>



@endsection
