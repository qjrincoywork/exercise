<?php
class PentagonalNumber
{
    public function dots($number) 
    {
        return (3*(pow($number, 2)) - $number)/2;
    }
}
$pentagonal = new PentagonalNumber;

echo "<pre>";
echo $pentagonal->dots(4);
echo "</pre>";
?>