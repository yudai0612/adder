<?php
require_once('HalfAdder.php');

class FullAdder extends Adder {

    protected static $cnt = 0;
    public $x = 200;
    public $y = 30;

    public function __construct() {
        self::$cnt++;
        $this->y += (100 * self::$cnt);
    }

    public static function getCnt(){
        return self::$cnt;
    }

    public function sum($i1, $i2, $Ci) {
        return HalfAdder::sum( HalfAdder::sum($i1, $i2), $Ci );
    }

    public function carry($i1, $i2, $Ci) {
        return  HalfAdder::carry( HalfAdder::sum($i1, $i2), $Ci )
                || HalfAdder::carry($i1, $i2);
    }

    public function draw() {
        $x = $this->x;
        $y = $this->y;
        
        echo <<<FA
                ctx.strokeRect($x, $y, 80, 80);
                ctx.fillText("F.A",  $x+28,  $y+40);
                ctx.fillText("Ci",      $x,     $y+20);
                ctx.fillText("S",       $x+65,  $y+20);
                ctx.fillText("Co",      $x+65,  $y+40);
                ctx.fillText("i1",      $x,     $y+40);
                ctx.fillText("i2",      $x,     $y+60);\n
        FA;
    }
}