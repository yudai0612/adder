<?php
    require_once('../app/Adder.php');
    require_once('../app/MultibitAdderLogic.php');
    const MAX_BIT = 8;
    $a = $_REQUEST['former'];
    $b = $_REQUEST['latter'];

    $adders = [];
    $adders[0] = new HalfAdder();
    for($j=1; $j<$_REQUEST['bit']; $j++) {
        $adders[$j] = new FullAdder();
    }
?>

<!DOCTYPE html>
<html lang="ja">
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
                    <option value="1">...</option>
                    <?php for($j=1; $j<=MAX_BIT; $j++) : ?>
                        <option value="<?=$j?>"><?= $j ?></option>
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
                        <div id="digit"><?php for($j=MAX_BIT-1; $j>=0; $j--){echo "<span class=\"n\">$j</span>";} ?></div>
                        <div id="ckbxWrap0"></div>
                        <div id="ckbxWrap1"></div>
                        <div class="hissan">+)</div>
                        <input type="hidden" name="bit" value="0">
                    </div>
                </form>
            </p>
        </div>

        <p><?php print_r( MultibitAdderLogic::exec($a, $b) ); ?></p>

        <script src="asset/js/main.js"></script>

        <!-- CANVAS -->
        <?php
            echo <<<HEAD
            <canvas id="canvas" width="500" height="1000"></canvas>
            <script>
                var canvas = document.getElementById("canvas");
                if (canvas.getContext){
                    var ctx = canvas.getContext('2d');
                    ctx.strokeStyle = 'gray';
                    ctx.fillStyle = 'gray';
                    ctx.font = "12px 'Source Code Pro'";\n
            HEAD;

            for($j=0; $j<$_REQUEST['bit']; $j++) {
                $adders[$j]->draw();
                $adders[$j]->drawBus( !($j==$_REQUEST['bit']-1) );
            }

            echo <<<FOOT
                }
            </script>
            FOOT;
        ?>
    </body>
</html>