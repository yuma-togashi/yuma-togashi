@extends('layouts.login')

@section('content')

<div class="container">
  <img src="{{asset('images/'.Auth::user()->images) }}" class="img_logo">
  {!! Form::open(['url' => '/top']) !!}
    <div class="form-group">
    {!! Form::input('text', 'newPost', null, ['required','class' => 'form-control', 'placeholder' => '何をつぶやこうか…？' ] )!!}
    </div>
    <button type="submit" class="btn-right" >
      <img src="images/post.png" alt="投稿ボタン">
    </button>
  {!! Form::close() !!}
    @foreach ($posts as $post)
      <div class="card">
        <div class="card-haeder">
        <img src="{{ 'images/'.$post->images }}" class="post-logo">
        <div class="ml-2 d-flex flex-column">
          <p class="post-username">{{ $post->username }}</p>
          <p class="post-timeline">{{$post->posts }}</p>
          <p class="post-time">{{$post->created_at}}</p>
        </div>
        </div>
      @if(Auth::id()==$post->user_id)
        <!-- edit -->
        <a class="post-edit" href="/top/{{$post->id}}/update-form" data-target="post-modal-{{ $post -> id }}" data-whatever="{{ $post->posts }}">
        <img class="edit-img" src="images/edit.png" alt="post-edit-image">
        </a>
        <div class="edit-modal js-modal" id="post-modal-{{ $post->id }}">
          <div class="inner">
            <div class="ModalLayer-Mask"></div>
              <div class="inner-contents">
                {!! Form::open(['url' => '/top/update'])!!}
                {!! Form::hidden('id', $post -> id) !!}
                {!! Form::text('upPost', $post -> posts, ['required', 'class'=>'user-post-edit-contents','maxlength'=>'200'])!!}
                { !! Form::button('<img src="images/edit.png" a lt="post-edit-image">',['class' => "inner-post-edit-image",   'type' => 'submit']) !!}
                <!-- <button type="submit" class="inner-post-edit-image">
                <img src="images/edit.png" alt="post-edit-image">
                </button> -->
                {!! Form::close()!!}
              </div>
            </div>
          </div>
        </div>
        <!-- delete -->
        <div class-delete>
          <a button class="post-trash" name="trashId" href="/top/{{$post->id}}/delete"  onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
          <img class="trash" src="images/trash_h.png" alt="post-trash-image">
          </a>
        </div>
      @endif
      </div>
    @endforeach
</div>
@endsection
