<?php

require_once __DIR__ . '/config.php';

function connectDb()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function signupValidate($email, $password, $name, $tel, $address, $birthday, $sex)
{
    $errors = [];

    // バリデーション
    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }

    if (empty($name)) {
        $errors[] = MSG_NAME_REQUIRED;
    }

    if (empty($tel)) {
        $errors[] = MSG_TEL_REQUIRED;
    }

    if (empty($address)) {
        $errors[] = MSG_ADDRESS_REQUIRED;
    }

    if (empty($birthday)) {
        $errors[] = MSG_BIRTHDAY_REQUIRED;
    }

    if (empty($sex)) {
        $errors[] = MSG_SEX_REQUIRED;
    }

    return $errors;
}

function insertUser($email, $password, $name, $tel, $address, $birthday, $sex)
{
    $dbh = connectDb();

    $sql = <<<EOM
    INSERT INTO
        users
        (email, password, name, tel, address, birthday, sex)
    VALUES
        (:email, :password, :name, :tel, :address, :birthday, :sex);
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
    $stmt->bindParam(':sex', $sex, PDO::PARAM_INT);
    // パスワードのハッシュ化
    $pw_hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $pw_hash, PDO::PARAM_STR);

    $stmt->execute();
}