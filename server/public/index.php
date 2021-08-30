<?php

require_once __DIR__ . '/../common/functions.php';

$dbh = connectDb(); 
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset3="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | F TRIP</title>
    <link rel="stylesheet" href="https://unpkg.com/ress@3.0.0/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Shippori+Mincho:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/favicon">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="side">
                <h1>
                    <a class="logo opacity"  href="index.php">
                        <img src="images/logo_top.jpg" alt="サイトロゴ">
                    </a>
                </h1>
                <div class="mypage-favo">
                    <div class="mypage">
                        <a class="mypage-svg opacity" href="user/login.php">
                            <img src="images/login.svg" alt="マイページ">
                            <p>マイページ</p>
                        </a>
                    </div>
                    <div class="favo">
                        <a class="favo-svg opacity" href="user/login.php">
                            <img src="images/favo.svg" alt="お気に入り">
                            <p>お気に入り</p>
                        </a>
                    </div>
                </div>
                <div class="drawer resp-add">
                <input type="checkbox" id="drawer-check" class="drawer-hidden">
                <label for="drawer-check" class="drawer-open"><span></span></label>
                <nav>
                    <ul class="g-nav side">
                        <li><span class="choosing">HOME</span></li>
                        <li class="partition"><a href="restaurant.php">レストラン</a></li>
                        <li class="partition"><a href="hotel.php">ホテル・旅館</a></li>
                        <li class="partition"><a href="article.php">特集記事</a></li>
                        <li class="partition"><a href="">さがす</a></li>
                        <li><a href="user/login.php">マイページ</a></li>
                        <li><a href="user/login.php">お気に入り</a></li>
                    </ul>
                </nav>
            </div>
            </div>
                <nav class="resp-none">
                    <ul class="g-nav side">
                        <li><span class="choosing">HOME</span></li>
                        <li class="partition"><a href="restaurant.php">レストラン</a></li>
                        <li class="partition"><a href="hotel.php">ホテル・旅館</a></li>
                        <li class="partition"><a href="article.php">特集記事</a></li>
                        <li class="partition"><a href="">さがす</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div id="top-img">
            <div class="autoplay-slider">
                <div class="slide"><a href=""><img src="images/beach.jpg" alt="photo1"></a></div>
                <div class="slide"><a href=""><img src="images/kouyou.jpg" alt="photo2"></a></div>
                <div class="slide"><a href=""><img src="images/cafe.jpg" alt="photo3"></a></div>
                <div class="slide"><a href=""><img src="images/beach.jpg" alt="photo1"></a></div>
                <div class="slide"><a href=""><img src="images/kouyou.jpg" alt="photo2"></a></div>
                <div class="slide"><a href=""><img src="images/cafe.jpg" alt="photo3"></a></div>
            </div>
        </div>

        <div id="contents">
            <section id="new">
                <h2>新着記事</h2>
                <ul class="new-article">
                    <li class="opacity"><a href=""><img src="images/mthuji.jpg" alt=""><br>絶景！富士山を見ながら食事ができるレストラン</a></li>
                    <li class="opacity"><a href=""><img src="images/eitaro_food.jpg" alt=""><br>新鮮な卵と特製ダレの卵かけご飯食べ放題！</a></li>
                    <li class="opacity"><a href=""><img src="images/onsen.jpg" alt=""><br>森林の中でリラックス。自然を感じる露天風呂</a></li>
                </ul>
                <div class="more">
                    <a href="article.php">もっとみる</a>
                </div>
            </section>

            <section id="purpose">
                <h2>なにしたい？</h2>
                <ul class="purpose-list">
                    <li class="eat opacity"><a href="restaurant.php"><img src="images/eat.png" alt="食べたい"></a></li>
                    <li class="play opacity"><a href=""><img src="images/play.png" alt="遊びたい"></a></li>
                    <li class="buy opacity"><a href=""><img src="images/buy.png" alt="買いたい"></a></li>
                    <li class="healing opacity"><a href=""><img src="images/healing.png" alt="癒やされたい"></a></li>
                </ul>
            </section>

            <section id="area">
                <h2>エリア一覧</h2>
                <ul class="area-list">
                    <li><a href="">北海道・東北</a></li>
                    <li><a href="">関東</a></li>
                    <li><a href="">北陸</a></li>
                    <li><a href="">甲信越</a></li>
                    <li><a href="">東海</a></li>
                    <li><a href="">近畿</a></li>
                    <li><a href="">中国地方</a></li>
                    <li><a href="">四国</a></li>
                    <li><a href="">九州・沖縄</a></li>
                </ul>
            </section>
        </div>
        
        <footer>
            <ul id="footer-list" class="side">
                <li><a href="restaurant.php">レストラン予約</a></li>
                <li><a href="hotel.php">ホテル・旅館予約</a></li>
                <li><a href="">サイトマップ</a></li>
                <li><a href="">問い合わせ</a></li>
                <li><a href="">会員規約</a></li>
                <li><a href="">個人情報保護方針</a></li>
            </ul>
            <div id="copy">
                <div class="f-logo">
                    <a href="index.php"><img src="images/logo.png" alt="ロゴ"></a>
                </div>
                <p><small>&copy; 2021 F trip All Rights Reserved.</small></p>
            </div>
        </footer>
    </div>
</body>
</html>