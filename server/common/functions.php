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

function signupValidate($email, $name, $tel, $address, $birthday, $sex)
{
    $errors = [];

    // バリデーション
    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }

    // if (empty($password)) {
    //     $errors[] = MSG_PASSWORD_REQUIRED;
    // }

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

function reserveValidateRestaurant($reserve_day, $reserve_time, $people, $email, $name, $tel, $address, $age, $sex)
{
    $errors = [];

    if (empty($reserve_day)) {
        $errors[] = MSG_DATE_REQUIRED;
    }

    if (empty($reserve_time)) {
        $errors[] = MSG_TIME_REQUIRED;
    }

    if (empty($people)) {
        $errors[] = MSG_PEPLE_REQUIRED;
    }

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
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

    if (empty($age)) {
        $errors[] = MSG_AGE_REQUIRED;
    }

    if (empty($sex)) {
        $errors[] = MSG_SEX_REQUIRED;
    }

    return $errors;
}

function reserveValidateHotel($first_day, $last_day, $people, $email, $name, $tel, $address, $age, $sex)
{
    $errors = [];

    if (empty($first_day)) {
        $errors[] = MSG_FIRST_DATE_REQUIRED;
    }

    if (empty($last_day)) {
        $errors[] = MSG_LAST_DAY_REQUIRED;
    }

    if (empty($people)) {
        $errors[] = MSG_PEPLE_REQUIRED;
    }

    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
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

    if (empty($age)) {
        $errors[] = MSG_AGE_REQUIRED;
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

function insertReserveRestaurant($user_id, $plan_id, $reserve_day, $reserve_time, $people, $price, $total_amount)
{
    $dbh = connectDb();

    $sql = <<<EOM
    INSERT INTO
        restaurant_reservations
        (user_id, plan_id, reserve_day, reserve_time, people, price, total_amount)
    VALUES
        (:user_id, :plan_id, :reserve_day, :reserve_time, :people, :price, :total_amount);
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':plan_id', $plan_id, PDO::PARAM_INT);
    $stmt->bindParam(':reserve_day', $reserve_day, PDO::PARAM_STR);
    $stmt->bindParam(':reserve_time', $reserve_time, PDO::PARAM_STR);
    $stmt->bindParam(':people', $people, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':total_amount', $total_amount, PDO::PARAM_INT);

    $stmt->execute();
}

function insertReserveHotel($user_id, $plan_id, $first_day, $last_day, $people, $price, $total_amount)
{
    $dbh = connectDb();

    $sql = <<<EOM
    INSERT INTO
        hotel_reservations
        (user_id, plan_id, first_day, last_day, people, price, total_amount)
    VALUES
        (:user_id, :plan_id, :first_day, :last_day, :people, :price, :total_amount);
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':plan_id', $plan_id, PDO::PARAM_INT);
    $stmt->bindParam(':first_day', $first_day, PDO::PARAM_STR);
    $stmt->bindParam(':last_day', $last_day, PDO::PARAM_STR);
    $stmt->bindParam(':people', $people, PDO::PARAM_INT);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':total_amount', $total_amount, PDO::PARAM_INT);

    $stmt->execute();
}

function insertRestaurantfavo($user_id, $restaurant_id)
{
    $dbh = connectDb();

    $sql = <<<EOM
    INSERT INTO
        favorite_restaurants
        (user_id, restaurant_id)
    VALUES
        (:user_id, :restaurant_id);
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_INT);

    $stmt->execute();
}

function loginValidate($email, $password)
{
    $errors = [];

    // バリデーション
    if (empty($email)) {
        $errors[] = MSG_EMAIL_REQUIRED;
    }
    if (empty($password)) {
        $errors[] = MSG_PASSWORD_REQUIRED;
    }

    return $errors;
}

function findUserByEmail($email)
{
    $dbh = connectDb();

    $sql = <<<EOM
    SELECT
        *
    FROM
        users
    WHERE
        email = :email;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findUserById($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        users
    WHERE
        id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateUser($email, $name, $tel, $address, $birthday, $sex, $id)
{
    $dbh = connectDb();

    $sql = <<<EOM
    UPDATE
        users
    SET
        email = :email, 
        name = :name, 
        tel = :tel, 
        address = :address, 
        birthday = :birthday, 
        sex = :sex
    WHERE
        id = :id
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
    $stmt->bindParam(':sex', $sex, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    // $pw_hash = password_hash($password, PASSWORD_DEFAULT);
    // $stmt->bindParam(':password', $pw_hash, PDO::PARAM_STR);

    $stmt->execute();
}

function findRestaurant()
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        restaurants
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findRestaurantById($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        restaurants
    WHERE
        id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findRestaurantplansByRestaurantid($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        restaurant_plans
    WHERE
        restaurant_id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findRestaurantplansById($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        restaurant_plans
    WHERE
        id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findHotel()
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        hotels
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findHotelById($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        hotels
    WHERE
        id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findHotelplans($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        hotel_plans
    WHERE
        hotel_id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function findHotelplansById($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        hotel_plans
    WHERE
        id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findRestaurantreservationsById($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        restaurant_reservations
    WHERE
        user_id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findRestaurantplanById($restaurant_plan_id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        restaurant_plans
    WHERE
        id = :restaurant_plan_id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':restaurant_plan_id', $restaurant_plan_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function findHotelreservationsById($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        hotel_reservations
    WHERE
        user_id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findHotelplanById($hotel_plan_id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        hotel_plans
    WHERE
        id = :hotel_plan_id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':hotel_plan_id', $hotel_plan_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findRestfavoById($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        b.*
    FROM
        favorite_restaurants a
    INNER JOIN
        restaurants b
    ON
        a.restaurant_id = b.id
    WHERE
        a.user_id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function findRestfavoByPlanId($restaurant_favo_id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        *
    FROM
        restaurants
    WHERE
        id = :restaurant_favo_id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':restaurant_favo_id', $restaurant_favo_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function findHotelfavoById($id)
{
    $dbh = connectDb();
    
    $sql = <<<EOM
    SELECT
        b.*
    FROM
        favorite_hotels a
    INNER JOIN
        hotels b
    ON
        a.hotel_id = b.id
    WHERE
        a.user_id = :id;
    EOM;

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// function checkInput($var){
//     if(is_array($var)){
//     return array_map('checkInput', $var);
//     }else{
//     //NULLバイト攻撃対策
//     if(preg_match('/\0/', $var)){  
//     die('不正な入力です。');
//     }
//     //文字エンコードのチェック
//     if(!mb_check_encoding($var, 'UTF-8')){ 
//     die('不正な入力です。');
//     }
//     //改行、タブ以外の制御文字のチェック
//     if(preg_match('/\A[\r\n\t[:^cntrl:]]*\z/u', $var) === 0){  
//     die('不正な入力です。制御文字は使用できません。');
//     }
//     return $var;
// }
// }

