<?php
class Kaprekars
{
    public function constantValue($number, $prev = 0, $iterations = 0)  
    {
        if ($number == 0)  
        return 0;

        $prev = $number;
        $toAscend = str_split($prev);
        $toDescend = str_split($prev);
        sort($toAscend);
        rsort($toDescend);
        $subtrahend = implode("", $toAscend);
        $minuend = implode("", $toDescend);
        $difference = '';
        
        $difference = $minuend - $subtrahend;
        if (($difference != $prev) && ($difference||$prev == 6147))
        {
            $iterations++;
        } elseif ($difference == $prev) {
            return $difference."<br> Iterations: ".$iterations."<br>";
        }
        
        return $this->constantValue($difference, $prev, $iterations);
    }
}
    $kaprekars = new Kaprekars;
    echo $kaprekars->constantValue(3524) . "<br>";  
    echo $kaprekars->constantValue(1000) . "<br>";  
    echo $kaprekars->constantValue(1234) . "<br>";
    echo $kaprekars->constantValue(9812) . "<br>"; 
?>