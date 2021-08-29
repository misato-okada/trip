<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset3="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>レストランTOP | F TRIP</title>
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
                <div class="login-favo">
                    <div class="login">
                        <a class="login-svg opacity" href="user/login.php">
                            <img src="images/login.svg" alt="ログイン">
                            <p>ログイン</p>
                        </a>
                    </div>
                    <div class="favo">
                        <a class="favo-svg opacity" href="">
                            <img src="images/favo.svg" alt="お気に入り">
                            <p>お気に入り</p>
                        </a>
                    </div>
                </div>
                <div class="drawer resp-add">
                <input type="checkbox" id="drawer-check" class="drawer-hidden">
                <label for="drawer-check" class="drawer-open"><span></span></label>
                <nav >
                    <ul class="g-nav side">
                        <li><a href="index.html">HOME</a></li>
                        <li class="partition"><span class="choosing">レストラン</span></li>
                        <li class="partition"><a href="hotel.php">ホテル・旅館</a></li>
                        <li class="partition"><a href="article.php">特集記事</a></li>
                        <li class="partition"><a href="">さがす</a></li>
                        <li><a href="">ログイン</a></li>
                        <li><a href="">お気に入り</a></li>
                    </ul>
                </nav>
            </div>
            </div>
                <nav class="resp-none">
                    <ul class="g-nav side">
                        <li><a href="index.html">HOME</a></li>
                        <li class="partition"><span class="choosing">レストラン</span></li>
                        <li class="partition"><a href="hotel.php">ホテル・旅館</a></li>
                        <li class="partition"><a href="article.php">特集記事</a></li>
                        <li class="partition"><a href="">さがす</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="top-line">
            <h2>レストラン</h2>
            <div>
                <img src="images/restaurant-img.jpg" alt="レストラン写真">
            </div>
        </div>

        <div id="contents">
            <section id="new">
                <h3>新着記事</h3>
                <ul class="new-article">
                    <li class="opacity"><a href=""><img src="images/mthuji.jpg" alt=""><br>絶景！富士山を見ながら食事ができるレストラン</a></li>
                    <li class="opacity"><a href=""><img src="images/eitaro_food.jpg" alt=""><br>新鮮な卵と特製ダレの卵かけご飯食べ放題！</a></li>
                    <li class="opacity"><a href=""><img src="images/onsen.jpg" alt=""><br>森林の中でリラックス。自然を感じる露天風呂</a></li>
                </ul>
                <div class="more">
                    <a href="restaurant-list.php#list-contents">一覧へ</a>
                </div>
            </section>

            <section id="type">
                <h3>ジャンル</h3>
                <ul class="type-list">
                    <li><a href="">和食</a></li>
                    <li><a href="">中華</a></li>
                    <li><a href="">フレンチ</a></li>
                    <li><a href="">イタリアン</a></li>
                    <li><a href="">B級グルメ</a></li>
                    <li><a href="">スイーツ</a></li>
                </ul>
            </section>

            <section id="area">
                <h3>エリア一覧</h3>
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