<?php

class HalfAdder {
    static function sum($in1, $in2) {
        return $in1 ^ $in2;
    }

    static function carry($in1, $in2) {
        return $in1 && $in2;
    }
}