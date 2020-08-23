<?php

class HalfAdder {

    // コンストラクタ: 作成されたインスタンスを数える
    protected static $cnt = 0;
    function __construct() { self::$cnt++; }

    static function sum($in1, $in2) {
        return $in1 ^ $in2;
    }

    static function carry($in1, $in2) {
        return $in1 && $in2;
    }

    static function show($x, $y) {
        echo <<<HA
                ctx.strokeRect($x, $y, 80, 80);
                ctx.font = "12px 'Source Code Pro'";
                ctx.fillText("H.A",  $x+28,  $y+40);
                ctx.fillText("S",    $x+65,  $y+20);
                ctx.fillText("Co",   $x+65,  $y+40);
                ctx.fillText("i1",   $x,     $y+40);
                ctx.fillText("i2",   $x,     $y+60);
                
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
                
                // carry bus
                ctx.beginPath();
                ctx.moveTo(    $x+80,   $y+40);
                    ctx.lineTo($x+100,  $y+40);
                    ctx.lineTo($x+100,  $y+90);
                    ctx.lineTo($x-20,   $y+90);
                    ctx.lineTo($x-20,   $y+120);
                    ctx.lineTo($x,      $y+120);
                ctx.stroke();\n
        HA;
    }
}