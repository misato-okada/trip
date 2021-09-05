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
                <h4>予約内容送信</h4>
                <p>予約内容を送信しました。</p>
                <p>※まだ予約は確定していません。予約確定後、代表者メールアドレスに予約確定メールをお送りします。</p>
                <div class="btn-area">
                    <a href="../index.php" class="btn home-back-btn">HOMEに戻る</a>
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
                <p><small>&copy; 2021 F trip All Rights Reserved.</small></p>
            </div>
        </footer>
</body>
<!-- <div class="container">
    <?php  //if ( isset($_GET['result']) && $_GET['result'] ) : // 送信が成功した場合?>
        <h3>予約内容送信</h4>
        <p>予約内容を送信しました。</p>
        <p>※まだ予約は確定していません。予約確定後、代表者メールアドレスに予約確定メールをお送りします。</p>
        <hr>
        <?php //elseif (isset($result) && !$result ): // 送信が失敗した場合 ?>
        <h3>送信失敗</h4>
        <p>申し訳ございませんが、送信に失敗しました。</p>
        <p>しばらくしてもう一度お試しになるか、お電話にてご連絡ください。</p>
        <p>メール：<a href="mailto:info@example.com">Contact</a></p>
        <hr>
    <?php //endif; ?>
</div> -->
</html>