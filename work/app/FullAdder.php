<?php
require_once('HalfAdder.php');

class FullAdder {
    
    // コンストラクタ: 作成されたインスタンスを数える
    protected static $cnt = 0;
    function __construct() { self::$cnt++; }

    static function sum($in1, $in2, $c) {
        return HalfAdder::sum(HalfAdder::sum($in1, $in2), $c);
    }

    static function carry($in1, $in2, $c) {
        return  HalfAdder::carry(HalfAdder::sum($in1, $in2), $c)
                || HalfAdder::carry($in1, $in2);
    }

    public function show($x, $y) {
        echo <<<FA
                var p =  {x:$x, y:$y};
                ctx.strokeRect(p['x'], p['y'], 80, 80);
                ctx.font = "12px 'Source Code Pro'";
                ctx.fillText("F.A",  p['x']+28,  p['y']+40);
                ctx.fillText("Ci",      p['x'],     p['y']+20);
                ctx.fillText("S",       p['x']+65,  p['y']+20);
                ctx.fillText("Co",      p['x']+65,  p['y']+40);
                ctx.fillText("i1",      p['x'],     p['y']+40);
                ctx.fillText("i2",      p['x'],     p['y']+60);

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

                // sum bus
                ctx.beginPath();
                ctx.moveTo(    $x+80,   $y+20);
                    ctx.lineTo($x+120,      $y+20);
                ctx.stroke();

                ctx.beginPath();
                ctx.moveTo(    $x+80,   $y+40);
                    ctx.lineTo($x+100,  $y+40);
                    ctx.lineTo($x+100,  $y+90);
                    ctx.lineTo($x-20,   $y+90);
                    ctx.lineTo($x-20,   $y+120);
                    ctx.lineTo($x,      $y+120);
                ctx.stroke();\n
        FA;
    }
}