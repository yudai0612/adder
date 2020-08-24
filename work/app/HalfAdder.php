<?php

class HalfAdder {

    public $x, $y;
    public function sum($in1, $in2) {
        return $in1 ^ $in2;
    }

    public function carry($in1, $in2) {
        return $in1 && $in2;
    }

    public function draw($x, $y) {
        echo <<<HA
                ctx.strokeRect($x, $y, 80, 80);
                ctx.fillText("H.A",  $x+28,  $y+40);
                ctx.fillText("S",    $x+65,  $y+20);
                ctx.fillText("Co",   $x+65,  $y+40);
                ctx.fillText("i1",   $x,     $y+40);
                ctx.fillText("i2",   $x,     $y+60);\n
        HA;

        $this->x = $x;
        $this->y = $y;
    }
}