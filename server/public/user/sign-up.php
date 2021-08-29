<?php

// 関数ファイルを読み込む
require_once __DIR__ . '/../../common/functions.php';

// 初期化
$email = '';
$password = '';
$name = '';
$tel = '';
$address = '';
$birthday = '';
$sex = '';

// エラーチェック用の配列
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $name = filter_input(INPUT_POST, 'name');
    $tel = filter_input(INPUT_POST, 'tel');
    $address = filter_input(INPUT_POST, 'address');
    $birthday = filter_input(INPUT_POST, 'birthday');
    $sex = filter_input(INPUT_POST, 'sex');

    // バリデーション
    $errors = signupValidate($email, $password, $name, $tel, $address, $birthday, $sex);

    if (empty($errors)) {
    insertUser($email, $password, $name, $tel, $address, $birthday, $sex);

    header('Location: login.php');
    exit;
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset3="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録 | F TRIP</title>
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
        <h2>新規会員登録</h2><hr>
        <div class="form-area">
            <?php if ($errors): ?>
                <ul class="errors">
                    <?php foreach ($errors as $error): ?>
                        <li><?= h($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="" method="post">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" placeholder="Email" value="<?= h($email) ?>">
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password" placeholder="Password">
                <label for="name">氏名</label>
                <input type="text" name="name" id="name" placeholder="Name" value="<?= h($name) ?>">
                <label for="tel">電話番号</label>
                <input type="tel" name="tel" id="tel" placeholder="Tel" value="<?= h($tel) ?>">
                <label for="address">住所</label>
                <input type="text" name="address" id="address" placeholder="Address" value="<?= h($address) ?>">
                <label for="password">生年月日</label>
                <input type="date" name="birthday" id="birthday" value="<?= h($birthday) ?>">
                <label for="sex">性別</label>
                <input type="radio" name="sex" id="sex" value="1"
                <?php if (isset($_POST['sex']) && $_POST['sex'] == "1") echo 'checked'; ?>>男
                <input type="radio" name="sex" id="sex" value="2"
                <?php if (isset($_POST['sex']) && $_POST['sex'] == "2") echo 'checked'; ?>>女
                <input type="radio" name="sex" id="sex" value="3"
                <?php if (isset($_POST['sex']) && $_POST['sex'] == "3") echo 'checked'; ?>>その他
                <div class="btn-area">
                    <input type="submit" value="新規会員登録" class="btn">
                    <a href="login.php" class="sub-link">ログイン</a>
                </div>
            </form>
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
</body>