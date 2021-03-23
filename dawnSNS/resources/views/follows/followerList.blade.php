@extends('layouts.login')

@section('content')

<div class="follow-list-images">
  <p>Follower list</p>
  <div class="follower-images">
  @foreach ($timelines as $timeline)
      <a href="/profile/{{ $timeline -> id}}">
        <img src="images/{{ $timeline -> images}}" alt="follow image" class="img_logo">
      </a>
  @endforeach
  </div>
</div>

<!-- FollowerList TimeLines -->
<div id="followTimeLines">
  @foreach ($timelines as $timeline)
  <div id="followListPost" class="user-post">
    <a href="/profile/{{ $timeline -> id}}">
      <img class="img_logo" src="images/{{ $timeline -> images}}" alt="user-image">
    </a>
        <p class="post-username">{{ $timeline->username }}</p>
        <p class="post-timeline">{{$timeline->posts }}</p>
        <p class="post-time">{{$timeline->created_at}}</p>
  </div>
  @endforeach
</div>

@endsection
