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
    <div>
        <?php foreach($histories as $history){ ?>
            <p><?php print(h(number_format($history['history_id']))); ?></p>
            <p><?php print($history['purchase_date']); ?></p>
            <p><?php print(h(number_format($history['total_price']))); ?>円</p>
        <?php } ?>
    </div>
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