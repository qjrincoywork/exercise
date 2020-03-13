<?php
class StringManipulate
{
    public function removeDuplicate($string)
    {
        $tmp = [];
        $i = 0;
        
        while (isset($string[$i])){
            $tmp[$string[$i]] = $i;
            $i++;
        }
        
        $result = '';
        foreach ($tmp as $k => $v) {
            $result .= $k;
        }
        
        return $result;
    }
}
    $stringManipulate = new StringManipulate;
    $value = "quirjohnincoy";
    echo "<pre>";
    echo $stringManipulate->removeDuplicate($value);
    echo "</pre>";
?>