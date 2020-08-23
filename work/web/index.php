<?php
    require_once('../app/Adder.php');
    const MAX_BIT = 5;
    $x = $_REQUEST['former'];
    $y = $_REQUEST['latter'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>加算器作り</title>
</head>
<body>
    <!-- 入力のbit数をもらう -->
    <select name="bit">
        <?php for($i=1; $i<=MAX_BIT; $i++) : ?>
            <option value="<?=$i?>"><?= $i ?></option>
        <?php endfor; ?>
    <select>

    <!-- bit数の数だけチェックボックスを表示 -->
    <form method="post">
        <div id="ckbxWrap0"></div>
        <div id="ckbxWrap1"></div>
        <input type="submit" value="submit">
    </form>
    
    <p><?php var_dump( Adder::exec($x, $y) ); ?></p>

    <script src="asset/js/main.js"></script>
</body>
</html>