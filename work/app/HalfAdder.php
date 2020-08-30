<?php

class HalfAdder extends Adder {
    public $x = 200;
    public $y = 30;

    public function sum($i1, $i2) {
        return $i1 ^ $i2;
    }

    public function carry($i1, $i2) {
        return $i1 && $i2;
    }

    public function draw() {
        $x = $this->x;
        $y = $this->y;
        
        echo <<<HA
                ctx.strokeRect($x, $y, 80, 80);
                ctx.fillText("H.A",  $x+28,  $y+40);
                ctx.fillText("S",    $x+65,  $y+20);
                ctx.fillText("Co",   $x+65,  $y+40);
                ctx.fillText("i1",   $x,     $y+40);
                ctx.fillText("i2",   $x,     $y+60);\n
        HA;
    }
}