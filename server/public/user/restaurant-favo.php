<?php
require_once __DIR__ . '/../../common/functions.php';

session_start();
// ログイン判定
if (empty($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$id = filter_input(INPUT_GET, 'id');
$current_user = findUserById($_SESSION['id']);
$restaurant = findRestaurantById($id);

$user_id = $current_user['id'];
$restaurant_id = $restaurant['id'];

insertRestaurantfavo($user_id, $restaurant_id);

header('Location: ' . $_SERVER['HTTP_REFERER'] . '');
exit;
?>