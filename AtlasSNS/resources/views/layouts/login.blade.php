<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
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
        <div class="header_content" >
            <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
                <div class="header_right">
                    <!-- http://taustation.com/laravel-login-user-acquisition/ -->
                    <p>{{ Auth::user()->username }}さん</p>



                        <!-- 2023年4月16日 アコーディオンメニュー -->
                        <div class="accordion">
                            <input id="block-01" type="checkbox" class="toggle">
                                <label class="Label" for="block-01"></label>
                                    <div class="content">
                                        <nav class="menu">
                                            <ul>
                                                <li><a href="/top">HOME</a></li>
                                                <li><a href="/userProfile">プロフィール編集</a></li>
                                                <li><a href="/logout">ログアウト</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                        </div>



                    <img src="{{ \Storage::url(Auth::user()->image) }}" alt="ユーザーアイコン">
            </div>
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
            <div id="side-bar">

                <div id="confirm">
                    <div class="side_bar">
                        <br>
                            <p>{{ Auth::user()->username }}さんの</p>
                        <br>
                            <div class="follow_count">
                                <p class="count_content">フォロー数</p>
                                <!-- Redmine #1478の二枚目の画像を参考にした -->
                                <p>{{ Auth::user()->follows()->count() }}名</p>
                            </div>
                        <br>
                            <p class="btn followList_btn"><a href="/followList">フォローリスト</a></p>
                        <br>
                            <div class="follow_count">
                                <p class="count_content">フォロワー数</p>
                                <p>{{ Auth::user()->followers()->count() }}名</p>
                            </div>
                        <br>
                            <p class="btn followList_btn"><a href="/followerList">フォロワーリスト</a></p>
                        <br>
                        <br>
                        <br>
                    </div>
                <div class="search_btn">
                    <br>
                    <p class="btn btn_center"><a href="/userSearch">ユーザー検索</a></p>
                </div>
        </div>
        </div>
    </div>

    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- <script src="js/script.js"></script> -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
