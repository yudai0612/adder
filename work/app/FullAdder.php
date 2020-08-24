<?php
require_once('HalfAdder.php');

class FullAdder {

    public $x, $y;

    public function sum($in1, $in2, $c) {
        return HalfAdder::sum(HalfAdder::sum($in1, $in2), $c);
    }

    public function carry($in1, $in2, $c) {
        return  HalfAdder::carry(HalfAdder::sum($in1, $in2), $c)
                || HalfAdder::carry($in1, $in2);
    }

    public function draw($x, $y) {
        echo <<<FA
                var p =  {x:$x, y:$y};
                ctx.strokeRect($x, $y, 80, 80);
                ctx.fillText("F.A",  $x+28,  $y+40);
                ctx.fillText("Ci",      $x,     $y+20);
                ctx.fillText("S",       $x+65,  $y+20);
                ctx.fillText("Co",      $x+65,  $y+40);
                ctx.fillText("i1",      $x,     $y+40);
                ctx.fillText("i2",      $x,     $y+60);\n
        FA;

        $this->x = $x;
        $this->y = $y;
    }
}