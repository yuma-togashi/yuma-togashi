<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
    <script src="{{asset('js/script.js')}}" type="text/javascript" charset="UTF-8"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a class="header_logo" href="/top"><img src="images/main_logo.png"></a></h1>
            <div id="menu">
                <div class="a-menu">
                    <p><a class="a-click" >{{ Auth::user()->username }} さん</a></p>
                    <img class="img_logo head-icon" src="{{ 'images/'.Auth::user()->images }}">
                </div>
                <ul class="user-info">
                    <!-- アコーディオンメニュー -->
                    <li class="a-item"><a href="/top">HOME</a></li>
                    <li class="a-item"><a href="/profile">プロフィール編集</a></li>
                    <li class="a-item"><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }} さんの</p>
                <div>
                <p>フォロー数</p>
                <p class="follow-count">{{ Auth::user()->followersCount() }}名</p>
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p class="follower-count">{{ Auth::user()->followsCount() }}名</p>
                </div>
                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
