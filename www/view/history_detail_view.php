<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
<?php include VIEW_PATH . 'templates/header_logined.php'; ?>
<h1>購入明細</h1>
<div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
<<<<<<< HEAD
    <div>
        <?php foreach($histories as $history){ ?>
            <p><?php print(h(number_format($history['history_id']))); ?></p>
            <p><?php print($history['purchase_date']); ?></p>
            <p><?php print(h(number_format($history['total_price']))); ?>円</p>
        <?php } ?>
    </div>
=======
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
                <th>注文番号</th>
                <th>購入日時</th>
                <th>合計金額</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($histories as $history){ ?>
                <tr>
                    <td><?php print(h($history['history_id'])); ?></td>
                    <td><?php print($history['purchase_date']); ?></td>
                    <td><?php print(h(number_format($history['total_price']))); ?>円</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
>>>>>>> 737fd024df926a76ef3da0b5ffd2ece9fdfd1d29
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>商品名</th>
                <th>購入時の商品価格</th>
                <th>購入数</th>
                <th>小計</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($details as $detail){ ?>
                <tr>
                    <td><?php print(h($detail['name'])); ?></td>
                    <td><?php print(h(number_format($detail['purchase_price']))); ?>円</td>
                    <td><?php print(h(number_format($detail['amount']))); ?></td>
                    <td><?php print(h(number_format($detail['purchase_price'] * $detail['amount']))); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>