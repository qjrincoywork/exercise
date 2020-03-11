<?php
    function removeDuplicate($string) {
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

    $string = "quirjohnincoy";
    echo "<pre>";
    echo removeDuplicate($string);
    echo "</pre>";
    //
    /* $var_arr = array();
    $j = mb_strlen($theString);
    for ($k = 0; $k < $j; $k++)
    {
        $char = mb_substr($theString, $k, 1);
        $var_arr[$char] = $k;
    }
    $string = '';
    foreach ($var_arr as $k => $v) {
        $string .= $k;
    }
    echo $string; */

    //
    /* $str = str_split($theString);
    $strArr = array_unique($str);
    $theString = '';
    foreach ($strArr as $v) {
        $theString .= $v;
    }
    echo $theString;*/
?>