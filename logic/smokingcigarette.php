<?php
class SmokingCigarette
{
    public function cigarettes($testCases)
    {
        if(!is_array($testCases))
            return 'Invalid Test Cases';
        
        $count = count($testCases);
        $result = '';
        for ($i=0; $i < $count; $i++)
        {
            if($testCases[$i] > 1) {
                $result .= $testCases[$i] + 2 ."<br>";
            } else {
                $result .= "not enough butt/s";
            }
        }
        
        return $result;
    }
}
    $total = new SmokingCigarette;
    $testCases = [3,5];
    echo "<pre>";
    echo $total->cigarettes($testCases);
    echo "</pre>";
?>