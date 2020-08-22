<?php
    require_once('../app/Adder.php');
    const MAX_BIT = 5;
    $x = [1,1];
    $y = [1,1,1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>加算器作り</title>
</head>
<body>
    <select name="bit">
        <option value="">入力のbit数を選択してください</option>
        <?php for($i=1; $i<=MAX_BIT; $i++) : ?>
            <option value="<?=$i?>"><?= $i ?></option>
        <?php endfor; ?>
    <select>
    <p><?php print_r( Adder::exec($x, $y) ); ?></p>

    <script src="asset/js/main.js"></script>
</body>
</html>