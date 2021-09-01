<?php

require_once __DIR__ . '/../../common/functions.php';

session_start();

if (empty($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$id = filter_input(INPUT_GET, 'id');
$current_user = findUserById($_SESSION['id']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset3="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報確認・変更 | F current_user</title>
    <link rel="stylesheet" href="https://unpkg.com/ress@3.0.0/dist/ress.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Shippori+Mincho:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/favicon.ico" type="image/favicon">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
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
        <h2>ユーザー情報確認・変更</h2><hr>
        <div class="form-area">
            <div class="user-details">
                <h4>メールアドレス</h4>
                <div><?= h($current_user['email']) ?></div>
                <h4>氏名</h4>
                <div><?= h($current_user['name']) ?></div>
                <h4>電話番号</h4>
                <div><?= h($current_user['tel']) ?></div>
                <h4>住所</h4>
                <div><?= h($current_user['address']) ?></div>
                <h4>生年月日</h4>
                <div><?= h($current_user['birthday']) ?></div>
                <h4>性別</h4>
                <div>
                    <?php
                    if (isset($current_user['sex']) && $current_user['sex'] == "1") {
                    echo '男';
                    } elseif (isset($current_user['sex']) && $current_user['sex'] == "2") {
                    echo '女';
                    } else {
                    echo 'その他'; 
                    }
                    ?>
                </div>
            </div>
            <div class="btn-area mypage-btn">
                    <a href="edit.php?id=<?= h($current_user['id']) ?>" class="btn">ユーザー情報変更</a>
                    <a href="mypage.php?id=<?= h($current_user['id']) ?>" class="btn home-back-btn">戻る</a>
            </div>
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
                <p><small>&copy; 2021 F current_user All Rights Reserved.</small></p>
            </div>
        </footer>
</body>