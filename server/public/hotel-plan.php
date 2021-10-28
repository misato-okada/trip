<?php
require_once __DIR__ . '/../common/functions.php';

session_start();

$dbh = connectDb();

$id = filter_input(INPUT_GET, 'id');
$hotel = findHotelById($id);
$hotel_plan = findHotelplansById($id);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset3="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($hotel['name'])?> | F TRIP</title>
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
                <?php if (!empty($_SESSION['id'])) : ?>
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
                <?php else :?>
                    <div class="mypage-favo">
                        <div class="mypage">
                            <a class="mypage-svg opacity" href="user/login.php">
                                <img src="images/login_door.svg" alt="ログイン">
                                <p>ログイン</p>
                            </a>
                        </div>
                        <div class="favo">
                            <a class="favo-svg opacity" href="user/sign-up.php">
                                <img src="images/login.svg" alt="新規登録">
                                <p>新規登録</p>
                            </a>
                        </div>
                    </div>
                <?php endif; ?> 

                <div class="drawer resp-add">
                <input type="checkbox" id="drawer-check" class="drawer-hidden">
                <label for="drawer-check" class="drawer-open"><span></span></label>
                <nav>
                    <ul class="g-nav side">
                        <li><span class="choosing">HOME</span></li>
                        <li class="partition"><a href="restaurant.php">レストラン</a></li>
                        <li class="partition"><a href="hotel.php">ホテル・旅館</a></li>
                        <li class="partition"><a href="">特集記事</a></li>
                        <li class="partition"><a href="">さがす</a></li>
                        <?php if (!empty($_SESSION['id'])) : ?>
                            <li><a href="user/login.php">マイページ</a></li>
                            <li><a href="user/login.php">お気に入り</a></li>
                        <?php else :?>
                            <li><a href="user/login.php">ログイン</a></li>
                            <li><a href="user/sign-up.php">新規登録</a></li>
                        <?php endif; ?> 
                    </ul>
                </nav>
            </div>
            </div>
                <nav class="resp-none">
                    <ul class="g-nav side">
                        <li><span class="choosing">HOME</span></li>
                        <li class="partition"><a href="restaurant.php">レストラン</a></li>
                        <li class="partition"><a href="hotel.php">ホテル・旅館</a></li>
                        <li class="partition"><a href="">特集記事</a></li>
                        <li class="partition"><a href="">さがす</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="top-line">
            <div class="detail-contents">
                <div class="detail-wrapper">
                    <h3><?= h($hotel_plan['title']) ?></h3>
                    <div class="detail-photo">
                        <div class="main-photo">
                            <img src="<?= h($hotel_plan['image']) ?>" alt="レストランプラン写真1">
                        </div>
                        <p><?= h($hotel_plan['contents']) ?></p>
                    </div>
                    <div class="detail-table">
                        <div class="detail-section">
                            <h4>プラン詳細</h4>
                            <table>
                            <tbody>
                                <tr>
                                    <th>プラン名</th>
                                    <td><?= h($hotel_plan['title']) ?></td>
                                </tr>
                                <tr>
                                    <th>金額</th>
                                    <td><?= h($hotel_plan['price']) ?>円 /人</td>
                                </tr>
                                <tr>
                                    <th>チェックイン</th>
                                    <td>15:00</td>
                                </tr>
                                <tr>
                                    <th>チェックアウト</th>
                                    <td>11:00</td>
                                </tr>
                                <tr>
                                    <th>注意事項</th>
                                    <td>支払い方法は現地決済のみです。<br>当日キャンセルの場合、宿泊料金のご返金はできません。</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <a href="hotel-reserve.php?id=<?= h($hotel_plan['id']) ?>" class="btn">予約する</a>
                        <a href="hotel-detail.php?id=<?= h($hotel_plan['hotel_id']) ?>" class="btn home-back-btn">戻る</a>
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