<?php
require_once('HalfAdder.php');

class FullAdder {
    static function sum($in1, $in2, $c) {
        return HalfAdder::sum(HalfAdder::sum($in1, $in2), $c);
    }

    static function carry($in1, $in2, $c) {
        return  HalfAdder::carry(HalfAdder::sum($in1, $in2), $c)
                || HalfAdder::carry($in1, $in2);
    }
}