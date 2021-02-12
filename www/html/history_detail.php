<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'history.php';

session_start();

if(is_logined() === false){
    redirect_to(LOGIN_URL);
}
  
$db = get_db_connect();
$user = get_login_user($db);
$history_id=get_post('history_id');
$token=get_post('token');

if(is_valid_csrf_token($token)){
    $histories = get_history($db, $user);
    $details = get_history_detail($db, $user, $history_id);
}else{
    $histories=[];
    $details=[];
    set_error('不正な操作が行われました');
}
include_once VIEW_PATH . 'history_detail_view.php';