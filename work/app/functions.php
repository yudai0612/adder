<?
function drawBus($Adder, $isTail) {
    $x = $Adder->x;
    $y = $Adder->y;

    echo <<<BUS
            // i1 bus
            ctx.beginPath();
            ctx.moveTo(    $x-40,   $y+40);
                ctx.lineTo($x,      $y+40);
            ctx.stroke();

            // i2 bus
            ctx.beginPath();
            ctx.moveTo(    $x-40,   $y+60);
                ctx.lineTo($x,      $y+60);
            ctx.stroke();

            // S bus
            ctx.beginPath();
            ctx.moveTo(    $x+80,   $y+20);
                ctx.lineTo($x+120,      $y+20);
            ctx.stroke();
    BUS;

    if($isTail) {
        echo <<<BUS
                // Co->Ci bus
                ctx.beginPath();
                ctx.moveTo(    $x+80,   $y+40);
                    ctx.lineTo($x+100,  $y+40);
                    ctx.lineTo($x+100,  $y+90);
                    ctx.lineTo($x-20,   $y+90);
                    ctx.lineTo($x-20,   $y+120);
                    ctx.lineTo($x,      $y+120);
                ctx.stroke();\n
        BUS;
    } else {
        echo <<<BUS
                // Co bus
                ctx.beginPath();
                ctx.moveTo(    $x+80,   $y+40);
                    ctx.lineTo($x+120,  $y+40);
                ctx.stroke();\n
        BUS;
    }
}
