<?php
require_once('HalfAdder.php');
require_once('FullAdder.php');

class Adder {
    static function exec($in1, $in2) {
        $length = max( count($in1), count($in2) );
        $result = array();
        $c = array();

        foreach ($in1 as $v) { $in1[] = (int)$v; }
        foreach ($in2 as $v) { $in2[] = (int)$v; }

        //0bit目
        $result[0] = HalfAdder::sum($in1[0], $in2[0]);
        $c[0] = HalfAdder::carry($in1[0], $in2[0]);

        //1bit目以降
        for($j=1; $j<$length+1; $j++){
            $result[$j] = FullAdder::sum($in1[$j], $in2[$j], $c[$j-1]);
            $c[$j] = FullAdder::carry($in1[$j], $in2[$j], $c[$j-1]);
        }

        return $result;
    }
}