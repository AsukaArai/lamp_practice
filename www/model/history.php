<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_history($db, $user, $history_id=null){
    $params=[];
    $sql="
        SELECT
            history_id,
            total_price,
            purchase_date
        FROM
            histories";
    if(is_admin($user) === false){
        $sql.="
        WHERE 
            user_id = ?
        ";
        $params[]=$user['user_id'];
    }
    if($history_id!==null){
        $sql.=empty($params) ? " WHERE history_id=?" : " AND history_id=?";
        $params[]=$history_id;
    }
    $sql.=" ORDER BY 
    purchase_date desc";
    return fetch_all_query($db, $sql, $params);
}

function get_history_detail($db, $user, $history_id){
    $params=[$history_id];
    $sql="
        SELECT
            history_details.history_id,
            history_details.purchase_price,
            history_details.amount,
            items.name
        FROM
            history_details
        JOIN
            items
        ON
            history_details.item_id=items.item_id
        WHERE
            history_id=?
        ";
    if(is_admin($user) === false){
        $sql.="
        AND
            exists(select * from histories where history_id=? and user_id=?)
        ";
        $params[]=$history_id;
        $params[]=$user['user_id'];
    }
    return fetch_all_query($db, $sql, $params);
}
