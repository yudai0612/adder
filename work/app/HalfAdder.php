<?php

class HalfAdder {
    static function sum($in1, $in2) {
        return (int)($in1 ^ $in2);
    }

    static function carry($in1, $in2):int {
        return (int)($in1 && $in2);
    }
}