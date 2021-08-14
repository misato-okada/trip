<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset3="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | 旅行アプリ</title>
    <link rel="stylesheet" href="https://unpkg.com/ress@3.0.0/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Shippori+Mincho:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="side">
                <h1><a href="index.php"><img src="../../image/logo.jpg" alt="サイトロゴ"></a></h1>
                <div class="login-favo">
                    <div class="login">
                            <a class="login-svg" href="">
                                <img src="../../image/login.svg" alt="ログイン">
                                <p>ログイン</p>
                            </a>
                    </div>
                    <div class="favo">
                            <a class="favo-svg" href="">
                                <img src="../../image/favo.svg" alt="お気に入り">
                                <p>お気に入り</p>
                            </a>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="g-nav side">
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="">レストラン</a></li>
                    <li><a href="">ホテル・旅館</a></li>
                    <li><a href="">特集記事</a></li>
                    <li><a href="">さがす</a></li>
                </ul>
            </nav>
        </header>

        <div class="top-img">
            <ul>
                <li><a href=""><img src="../../image/beach.jpg" alt="photo1"></a></li>
                <li><a href=""><img src="../../image/kouyou.jpg" alt="photo2"></a></li>
                <li><a href=""><img src="../../image/cafe.jpg" alt="photo3"></a></li>
            </ul>
        </div>

        <div class="home-contents">
            <section class="new">
                <h2>新着記事</h2>
                <ul class="new-article">
                    <li><a href=""><img src="../../image/mthuji.jpg" alt=""></a></li>
                    <li><a href=""><img src="../../image/eitaro_food.jpg" alt=""></a></li>
                    <li><a href=""><img src="../../image/onsen.jpg" alt=""></a></li>
                </ul>
                <div class="more">
                    <a href="">もっとみる</a>
                </div>
            </section>

            <section class="purpose">
                <h2>なにしたい？</h2>
                <ul class="purpose-list">
                    <li><a href=""><img src="../../image/eat.jpg" alt="食べたい"></a></li>
                    <li><a href=""><img src="../../image/play.jpg" alt="遊びたい"></a></li>
                    <li><a href=""><img src="../../image/buy.jpg" alt=""></a></li>
                    <li><a href=""><img src="../../image/healing.jpg" alt=""></a></li>
                </ul>
            </section>

            <section class="area">
                <h2>エリア一覧</h2>
                <ul class="area-list">
                    <li><a href=""><img src="" alt="">北海道・東北</a></li>
                    <li><a href=""><img src="" alt="">関東</a></li>
                    <li><a href=""><img src="" alt="">北陸</a></li>
                    <li><a href=""><img src="" alt="">甲信越</a></li>
                    <li><a href=""><img src="" alt="">東海</a></li>
                    <li><a href=""><img src="" alt="">近畿</a></li>
                    <li><a href=""><img src="" alt="">中国地方</a></li>
                    <li><a href=""><img src="" alt="">四国</a></li>
                    <li><a href=""><img src="" alt="">九州・沖縄</a></li>
                </ul>
            </section>
        </div>

        <footer>
            <ul>
                <li><a href="">レストラン予約</a></li>
                <li><a href="">ホテル・旅館予約</a></li>
                <li><a href="">サイトマップ</a></li>
                <li><a href="">問い合わせ</a></li>
                <li><a href="">会員規約</a></li>
                <li><a href="">個人情報保護方針</a></li>
            </ul>
            <div id="copy">
                <img src="../../image/logo.png" alt="ロゴ">
                <p><small>&copy; F TRIP</small></p>
            </div>
        </footer>
    </div>
</body>
</html>