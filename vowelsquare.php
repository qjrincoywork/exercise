<?php
function vowelSquare($strArr){
    if(count($strArr) < 2)
        return 'not found';

    $len_of_first = strlen($strArr[0]);
    foreach ($strArr as $val) {
        if (strlen($val) != $len_of_first) {
            return 'not found';
        }
    }
    
    for ($i=1; $i<count($strArr); $i++)  
    {
        for ($j=1; $j<strlen($strArr[$i]); $j++)
        {
            $square = $strArr[$i - 1][$j - 1]
                    . $strArr[$i - 1][$j]
                    . $strArr[$i][$j - 1]
                    . $strArr[$i][$j];
            $res = preg_match("/^[aeiuo]+$/", $square);
            if($res){
                $coordinates = ($i - 1) . '-' . ($j - 1);
				return $coordinates;
            }
        }
    }
    return 'not found';
}

$strArr = ['abcd', 'kree', 'fjoa'];
echo vowelSquare($strArr);
?>
