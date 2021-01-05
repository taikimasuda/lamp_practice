<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
$history_id = get_post('history_id');

$token = get_post('token');

if (is_valid_csrf_token($token)) {
    if (is_admin($user) === false) {
        $details_top = get_details_top($db, $history_id, $user['user_id']);
        $details = get_user_details($db, $history_id, $user['user_id']);
    } else {
        $details_top = get_details_top($db, $history_id);
        $details = get_user_details($db, $history_id);
    }
} else {
    set_error('不正な操作が行われました');
}

include_once VIEW_PATH . 'purchase_details_view.php';