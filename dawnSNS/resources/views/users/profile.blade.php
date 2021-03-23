@extends('layouts.login')

@section('content')
<!-- profile -->
<div class="profile">
  <img class="img_logo" src="{{ asset('images/'. Auth::user() -> images) }}" alt="user profile image">
  <div class=profile-name>
    <label class="profile-label">UserName</label>
    <input type="text" name="username" class="profile-username" value="{{ Auth::user() -> username}}"></input>
  </div>
  <div class="">
    <label class="profile-label">MailAdress</label>
    <input type="text" name="mail" value="{{ Auth::user()->mail }}" class="profile-mail"></input>
  </div>
  <div class="">
    <label class="profile-label">Password</label>
    <input type="password" name="old_password" value="{{ Auth::user()->password }}" class="profile-password"></input>
  </div>
  <div class="">
    <label class="profile-label">new Password</label>
    <input type="password" name="password" value="" class="profile-password"></input>
  </div>
  <div class="profile-bio">
    <label class="profile-label">Bio</label>
    <input type="text" name="bio" class="profile-user-bio" value="{{ Auth::user() -> bio}}"></input>
  </div>
  <div class="">
    <label class="profile-label">Icon Image</label>
    <input type="file" name="image" class="" >
  </div>
  <button type="submit" class="profile-update">更新</button>
</div>


@endsection
