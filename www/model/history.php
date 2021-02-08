<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_history($db, $user, $user_id){
    if(is_admin($user) === 1){
        $sql="
        SELECT
            history_id,
            total_price,
            purchase_date
        FROM
            histories
        ";
    }else{
        $sql="
        SELECT
            history_id,
            total_price,
            purchase_date
        FROM
            histories
        WHERE 
            user_id = ?
        ";
    }
    return array_reverse(fetch_all_query($db, $sql, [$user_id]));
}

function get_history_detail($db, $user, $history_id, $user_id){
    if(is_admin($user) === 1){
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
    }else{
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
        AND
            user_id=?
        ";
    }
    return fetch_all_query($db, $sql, [$history_id, $user_id]);
}
