<?php
    require_once('../app/Adder.php');
    require_once('../app/functions.php');
    const MAX_BIT = 8;
    $x = $_REQUEST['former'];
    $y = $_REQUEST['latter'];

    $adders = [];
    $adders[0] = new HalfAdder();
    for($i=1; $i<$_REQUEST['bit']; $i++) {
        $adders[$i] = new FullAdder();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic" rel="stylesheet">
        <link rel="stylesheet" href="asset/css/style.css">
        <title>加算器作り</title>
    </head>
    <body>
        <div class="container">
            <div> <!-- 入力のbit数を貰うためのselectタグ -->
                <div class="label">入力bit数</div>
                <select name="bit">
                    <?php for($i=1; $i<=MAX_BIT; $i++) : ?>
                        <option value="<?=$i?>"><?= $i ?></option>
                    <?php endfor; ?>
                <select>
                    </div>

            <p> <!-- 選択したbit数の数だけチェックボックスを表示 -->
                <form method="post">
                    <div>
                        <div class="label">計算開始ボタン</div>
                        <input type="submit" value="RUN">
                    </div>
                    <div>
                        <div id="digit"><?php for($i=MAX_BIT-1; $i>=0; $i--){echo "<span class=\"n\">$i</span>";} ?></div>
                        <div id="ckbxWrap0"></div>
                        <div id="ckbxWrap1"></div>
                        <div class="hissan">+)</div>
                        <input type="hidden" name="bit" value="0">
                    </div>
                </form>
            </p>
        </div>

        <script src="asset/js/main.js"></script>

        <!-- CANVAS -->
        <?php
            echo <<<HEAD
            <canvas id="canvas" width="500" height="1000"></canvas>
            <script>
                var canvas = document.getElementById("canvas");
                if (canvas.getContext){
                    var ctx = canvas.getContext('2d');
                    ctx.fillStyle = 'gray';
                    ctx.font = "12px 'Source Code Pro'";\n
            HEAD;

            for($i=0; $i<$_REQUEST['bit']; $i++) {
                $adders[$i]->draw(200, 30+(100*$i));
                drawBus( $adders[$i] , !($i==$_REQUEST['bit']-1) );
            }

            echo <<<FOOT
                }
            </script>
            FOOT;
        ?>
    </body>
</html>