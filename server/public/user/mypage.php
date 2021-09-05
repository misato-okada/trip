<?php

require_once __DIR__ . '/../../common/functions.php';

// セッション開始
session_start();
// ログイン判定
if (empty($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$id = filter_input(INPUT_GET, 'id');
$current_user = findUserById($_SESSION['id']);
$restaurant_plan_id = findRestaurantreservationsById($_SESSION['id']);
$restaurant_plan = findRestaurantplanById($restaurant_plan_id);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset3="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ | F TRIP</title>
    <link rel="stylesheet" href="https://unpkg.com/ress@3.0.0/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Shippori+Mincho:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/favicon.ico" type="image/favicon">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="side">
                <h1>
                    <a class="logo opacity"  href="../index.php">
                        <img src="../images/logo_top.jpg" alt="サイトロゴ">
                    </a>
                </h1>
            </div>
        </header>

        <div class="user-contents">
            <h2>マイページ</h2><hr>
            <div class="user-details">
                <div class="user-info">
                    <h3 class="sub-title"><?= h($current_user['name']) ?>さん</h3>
                    <a href="user-info.php?id=<?= h($current_user['id']) ?>">ユーザー情報確認・変更</a>
                </div>
                <div class="reserve-link">
                    <h4>＜ 予約中プラン ＞</h4>
                    <ul>
                            <li>
                                <a href="../restaurant-plan.php?id=<?= h($restaurant_plan['id']) ?>" class="opacity">
                                    <img src="../<?= h($restaurant_plan['image'])?>" alt="プラン写真">
                                    <p><?= h($restaurant_plan['title']) ?></p>
                                </a>
                            </li>
                    </ul>
                    <div class="">
                        <a href="">予約履歴一覧</a>
                    </div>
                </div>
                <div class="favo-link">
                    <h4>＜ お気に入り ＞</h4>
                    <ul>
                        <li>
                            <a href="" class="opacity"><img src="../images/hotel-view.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="" class="opacity"><img src="../images/hotel-view.jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="" class="opacity"><img src="../images/hotel-view.jpg" alt=""></a>
                        </li>
                    </ul>
                    <div class="">
                        <a href="">一覧へ</a>
                    </div>
                </div>
            </div>
            <div class="btn-area mypage-btn">
                <a href="logout.php" class="btn">ログアウト</a>
                <a href="../index.php" class="btn home-back-btn">HOMEに戻る</a>
            </div>
        </div>
        
        <footer>
            <ul id="footer-list" class="side">
                <li><a href="../restaurant.php">レストラン予約</a></li>
                <li><a href="../hotel.php">ホテル・旅館予約</a></li>
                <li><a href="">サイトマップ</a></li>
                <li><a href="">問い合わせ</a></li>
                <li><a href="">会員規約</a></li>
                <li><a href="">個人情報保護方針</a></li>
            </ul>
            <div id="copy">
                <div class="f-logo">
                    <a href="../index.php"><img src="../images/logo.png" alt="ロゴ"></a>
                </div>
                <p><small>&copy; 2021 F trip All Rights Reserved.</small></p>
            </div>
        </footer>
    </div>
</body>
</html>