<!DOCTYPE html>
<html lang="ja">
<head>
<?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴画面</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . ''); ?>">
</head>
<body>
    <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    <h1>購入履歴画面</h1>

    <div class="container">
        <?php include VIEW_PATH . 'templates/messages.php'; ?>
			
		<?php if(count($histories) > 0){ ?>
		<table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>注文番号</th>
                    <th>購入日時</th>
					<th>該当の注文の合計金額</th>
					<th>購入明細</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach($histories as $history){ ?>
                	<tr>
                    	<td><?php print(h($history['history_id'])); ?></td>
                    	<td><?php print(h($history['datetime'])); ?></td>
						<td><?php print(number_format(h($history['total_price']))); ?>円</td>
						<td> <form method="post" action="purchase_details.php">
							<input type="submit" value="購入明細" class="btn btn-danger delete">
							<input type="hidden" name="history_id" value="<?php print(h($history['history_id'])); ?>">
							<input  type="hidden" name="token" value="<?php print($token); ?>">
						</form></td>
                	</tr>
				<?php } ?>
            </tbody>
		</table>
		<?php } else { ?>
      <p>購入されたものはありません。</p>
    <?php } ?> 
    </div>
    
</body>
</html>