<?php
class VowelSquare
{
    public function vowels($strings)
    {
        if(count($strings) < 2)
            return 'not found';

        $lenOfFirst = strlen($strings[0]);
        foreach ($strings as $string) {
            if (strlen($string) != $lenOfFirst) {
                return 'not found';
            }
        }
        
        for ($i=1; $i < count($strings); $i++)  
        {
            for ($j=1; $j < strlen($strings[$i]); $j++)
            {
                $square = $strings[$i - 1][$j - 1]
                        . $strings[$i - 1][$j]
                        . $strings[$i][$j - 1]
                        . $strings[$i][$j];
                $result = preg_match("/^[aeiuo]+$/", $square);
                if($result){
                    $coordinates = ($i - 1) . '-' . ($j - 1);
                    return $coordinates;
                }
            }
        }
        return 'not found';
    }
}
    $square = new VowelSquare;
    $strings = ['abcd', 'kree', 'fjoa'];
    echo $square->vowels($strings);
?>
