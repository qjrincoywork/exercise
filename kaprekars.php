<?php
    function kaprekarsRec($n, $prev = 0, $iteration = 0)  
    {  
        if ($n == 0)  
        return 0;

        $prev = $n;
        $ascArr = str_split($prev);
        $descArr = str_split($prev);
        sort($ascArr);
        rsort($descArr);
        $asc = implode("", $ascArr);
        $desc = implode("", $descArr);
        $diff = '';
        
        $diff = $desc - $asc;
        if (($diff != $prev) && ($diff||$prev == 6147)) {
            $iteration++;
        }
        
        if ($diff == $prev){
            return $diff."<br> Iterations: ".$iteration."<br>";
        }
        
        return kaprekarsRec($diff, $prev, $iteration);
    }
    
    echo kaprekarsRec(3524) . "<br>";  
    echo kaprekarsRec(1000) . "<br>";  
    echo kaprekarsRec(1234) . "<br>";
    echo kaprekarsRec(9812) . "<br>"; 
?>