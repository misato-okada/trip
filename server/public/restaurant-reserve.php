<?php

require_once __DIR__ . '/../common/functions.php';

session_start();
// ログイン判定
if (empty($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

// $date = isset( $_POST[ 'date' ] ) ? $_POST[ 'date' ] : NULL;
// $people = isset( $_POST[ 'people' ] ) ? $_POST[ 'people' ] : NULL;
// $name = isset( $_POST[ 'name' ] ) ? $_POST[ 'name' ] : NULL;
// $email = isset( $_POST[ 'email' ] ) ? $_POST[ 'email' ] : NULL;
// $tel = isset( $_POST[ 'tel' ] ) ? $_POST[ 'tel' ] : NULL;
// $address = isset( $_POST[ 'address' ] ) ? $_POST[ 'address' ] : NULL;
// $age = isset( $_POST[ 'age' ] ) ? $_POST[ 'age' ] : NULL;
// $sex = isset( $_POST[ 'sex' ] ) ? $_POST[ 'sex' ] : NULL;
// $remarks = isset( $_POST[ 'remarks' ] ) ? $_POST[ 'remarks' ] : NULL;

// $errors = [];

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = filter_input(INPUT_POST, 'email');
//     $name = filter_input(INPUT_POST, 'name');
//     $tel = filter_input(INPUT_POST, 'tel');
//     $address = filter_input(INPUT_POST, 'address');
//     $age = filter_input(INPUT_POST, 'birthday');
//     $sex = filter_input(INPUT_POST, 'sex');
//     $remarks = filter_input(INPUT_POST, 'remarks');

//     $mail_body = 'フォームからのご予約問い合わせ' . "\n\n";
//     $mail_body .=  "お名前： " .h($name) . "\n";
//     $mail_body .=  "Email： " . h($email) . "\n";
//     $mail_body .=  "お電話番号： " . h($tel) . "\n" ;
//     $mail_body .=  "ご住所： " . h($address) . "\n" ;
//     $mail_body .=  "ご年齢： " . h($age) . "\n" ;
//     $mail_body .=  "性別： " . h($sex) . "\n\n" ;
//     $mail_body .=  "＜予約内容＞" . "\n" ;
//     $mail_body .=  "ご予約プラン" . h($restaurant_plan['title']). "\n" ;
//     $mail_body .=  "ご予約日時： " . h($date) . "\n" ;
//     $mail_body .=  "備考： " . h($remarks) . "\n\n" ;

//     $errors = reserveValidate($date, $people, $email, $name, $tel, $address, $age, $sex);

//     if (empty($errors)) {
//         insertReserve($reserve_day, $people, $plan_id, $user_id, $total_amount);
    
//     header('Location: index.php');
//     exit;
//     }
// }

$current_user = findUserById($_SESSION['id']);
$restaurant_plan = findRestaurantplansById($_SESSION['id']);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset3="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約フォーム | F TRIP</title>
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
        <h2>予約フォーム</h2><hr>
        <div class="form-area">
            <?php if ($errors): ?>
                <ul class="errors">
                    <?php foreach ($errors as $error): ?>
                        <li><?= h($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="" method="post">
                <label for="plan">予約プラン</label>
                <div id="plan"><?= h($restaurant_plan['title']) ?></div>
                <label for="reserve_day">予約日時</label>
                <input type="datetime-local" name="reserve_day" id="reserve_day" placeholder="reserve_day" value="<?= h($reserve_day) ?>">
                <label for="people">予約人数</label>
                <input type="number" name="people" id="people" placeholder="Number of people" value="<?= h($people) ?>">
                <label for="email">代表者メールアドレス</label>
                <input type="email" name="email" id="email" placeholder="Email" value="<?= h($current_user['email']) ?>">
                <label for="name">代表者名</label>
                <input type="text" name="name" id="name" placeholder="Name" value="<?= h($current_user['name']) ?>">
                <label for="tel">代表者電話番号</label>
                <input type="tel" name="tel" id="tel" placeholder="Tel" value="<?= h($current_user['tel']) ?>">
                <label for="address">代表者住所</label>
                <input type="text" name="address" id="address" placeholder="Address" value="<?= h($current_user['address']) ?>">
                <label for="age">代表者年齢</label>
                <input type="number" name="age" id="age" placeholder="Age" value="<?= h($age) ?>">
                <label for="sex">代表者性別</label>
                <input type="radio" name="sex" id="sex" value="1"
                <?php if (isset($_POST['sex']) && $_POST['sex'] == "1") echo 'checked'; ?>>男
                <input type="radio" name="sex" id="sex" value="2"
                <?php if (isset($_POST['sex']) && $_POST['sex'] == "2") echo 'checked'; ?>>女
                <input type="radio" name="sex" id="sex" value="3"
                <?php if (isset($_POST['sex']) && $_POST['sex'] == "3") echo 'checked'; ?>>その他
                <label for="remarks">備考</label>
                <textarea rows="5" cols="80" name="remarks" id="remarks" placeholder="ご要望などここに記入してください" value="<?= h($remark) ?>"></textarea>
                <div class="btn-area">
                    <!-- <input name="submitted" type="submit" value="送信する" class="btn"> -->
                    <a href="user/send_mail.php" class="btn">送信する</a>
                    <a href="restaurant_plan.php?=id<?= h($restaurant_plan['id']) ?>" class="btn home-back-btn">戻る</a>
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