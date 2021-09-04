<?php
require_once __DIR__ . '/../common/functions.php';

$dbh = connectDb();

$id = filter_input(INPUT_GET, 'id');
$restaurant = findRestaurantById($id);
$restaurant_plans = findRestaurantplansByRestaurantid($id);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset3="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($restaurant['name'])?> | F TRIP</title>
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
                        <li><a href="index.html">HOME</a></li>
                        <li class="partition"><span class="choosing">レストラン</span></li>
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
            <div class="detail-contents">
                <div class="detail-wrapper">
                    <h3><?= h($restaurant['name']) ?></h3>
                    <div class="detail-photo">
                        <input type="radio" name="photo" id="img1" checked>
                        <input type="radio" name="photo" id="img2">
                        <input type="radio" name="photo" id="img3">
                        <div class="main-photo">
                            <img src="<?= h($restaurant['img1']) ?>" alt="レストラン写真1">
                            <img src="<?= h($restaurant['img2']) ?>" alt="レストラン写真2">
                            <img src="<?= h($restaurant['img3']) ?>" alt="レストラン写真3">
                        </div>
                        <ul class="thumbnail">
                            <li>
                                <label for="img1" >
                                    <img src="<?= h($restaurant['img1']) ?>" alt="レストラン写真1" class="thumbnail-photo opacity">
                                </label>
                            </li>
                            <li>
                                <label for="img2">
                                    <img src="<?= h($restaurant['img2']) ?>" alt="レストラン写真2" class="thumbnail-photo opacity">
                                </label>
                            </li>
                            <li>
                                <label for="img3">
                                    <img src="<?= h($restaurant['img3']) ?>" alt="レストラン写真3" class="thumbnail-photo opacity">
                                </label>
                            </li>
                        </ul>
                        <p><?= h($restaurant['contents']) ?></p>
                    </div>
                    <div class="detail-table">
                        <div class="detail-section">
                            <h4>予約プラン</h4>
                            <?php foreach ($restaurant_plans as $restaurant_plan): ?>
                                <div class="plan">
                                    <div class="name">
                                        <h5>
                                            <a href="restaurant-plan.php?id=<?= h($restaurant_plan['id']) ?>">
                                                <?= h($restaurant_plan['title']) ?>
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="detail">
                                        <div class="detail-plan-img opacity">
                                            <a href="restaurant-plan.php?id=<?= h($restaurant_plan['id']) ?>">
                                                <img src="<?= h($restaurant_plan['image']) ?>" alt="予約プラン写真">
                                            </a>
                                        </div>
                                        <div class="list-text">
                                            <div><?= h($restaurant_plan['price']) ?></div>
                                            <p><?= h($restaurant_plan['contents']) ?></p>
                                            <a href="restaurant-plan.php?id=<?= h($restaurant_plan['id']) ?>" class="reserve-btn">詳細・予約はこちら</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="detail-section">
                            <h4>店舗詳細</h4>
                            <table>
                            <tbody>
                                <tr>
                                    <th>店舗名</th>
                                    <td><?= h($restaurant['name']) ?></td>
                                </tr>
                                <tr>
                                    <th>住所</th>
                                    <td><?= h($restaurant['address']) ?></td>
                                </tr>
                                <tr>
                                    <th>ジャンル</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>営業時間</th>
                                    <td><?= h($restaurant['opening_time']) ?>〜<?= h($restaurant['closing_time']) ?></td>
                                </tr>
                                <tr>
                                    <th>定休日</th>
                                    <td><?= h($restaurant['closing_day']) ?></td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td><?= h($restaurant['tel']) ?></td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <a href="restaurant-list.php#list-contents" class="btn home-back-btn">一覧に戻る</a>
                    </div>
                </div>
            </div>
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