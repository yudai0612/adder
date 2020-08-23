<?php
    require_once('../app/Adder.php');
    const MAX_BIT = 4;
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
        <!-- 入力のbit数を貰うためのselectタグ -->
        <select name="bit">
            <?php for($i=1; $i<=MAX_BIT; $i++) : ?>
                <option value="<?=$i?>"><?= $i ?></option>
            <?php endfor; ?>
        <select>

        <!-- 選択したbit数の数だけチェックボックスを表示 -->
        <?php 
            $adders = [];
            $adders[0] = new HalfAdder();
            for($i=1; $i<$_REQUEST['bit']; $i++) {
                $adders[$i] = new FullAdder();
            }
        ?>
        <form method="post">
            <div id="ckbxWrap0"></div>
            <div id="ckbxWrap1"></div>
            <input type="hidden" name="bit" value="0">
            <input type="submit" value="submit">
        </form>
        
        <p><?php var_dump( Adder::exec($x, $y) ); ?></p>

        <script src="asset/js/main.js"></script>

        <!-- CANVAS -->
        <?php
            echo <<<HEAD
            <canvas id="canvas" width="1000" height="1000"></canvas>
            <script>
                var canvas = document.getElementById("canvas");
                if (canvas.getContext){
                    var ctx = canvas.getContext('2d');\n
            HEAD;

            for($i=0; $i<$_REQUEST['bit']; $i++) {
                $adders[$i]->show(200, 100+(100*$i));
            }

            echo <<<FOOT
                }
            </script>
            FOOT;
        ?>
    </body>
</html>