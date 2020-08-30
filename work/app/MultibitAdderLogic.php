<?php
require_once('HalfAdder.php');
require_once('FullAdder.php');

class MultibitAdderLogic {
    static function exec($i1, $i2) {
        $length = max( count($i1), count($i2) );
        $result = array();
        $c = array();

        foreach ($i1 as $v) { $i1[] = (int)$v; }
        foreach ($i2 as $v) { $i2[] = (int)$v; }

        //0bit目
        $result[0] = HalfAdder::sum($i1[0], $i2[0]);
        $c[0] = HalfAdder::carry($i1[0], $i2[0]);

        //1bit目以降
        for($j=1; $j<$length+1; $j++){
            $result[$j] = FullAdder::sum($i1[$j], $i2[$j], $c[$j-1]);
            $c[$j] = FullAdder::carry($i1[$j], $i2[$j], $c[$j-1]);
        }

        return array( 'sum'=>$result, 'carry'=>$c );
    }
}