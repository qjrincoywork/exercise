<?php 
// PHP code for Maximum size square 
// sub-matrix with all 1s 

function printMaxSubSquare($M, $R, $C) 
{ 
	$S = array(array()) ; 

	/* Set first column of S[][]*/
	for($i = 0; $i < $R; $i++) 
		$S[$i][0] = $M[$i][0]; 
	
	/* Set first row of S[][]*/
	for($j = 0; $j < $C; $j++) 
		$S[0][$j] = $M[0][$j]; 
		
	/* Construct other entries of S[][]*/
	for($i = 1; $i < $R; $i++) 
	{ 
		for($j = 1; $j < $C; $j++) 
		{ 
			if($M[$i][$j] == 1) 
				$S[$i][$j] = min($S[$i][$j - 1], 
								$S[$i - 1][$j], 
								$S[$i - 1][$j - 1]) + 1; 
			else
				$S[$i][$j] = 0; 
		}
	} 
	
	/* Find the maximum entry, and indexes 
	of maximum entry in S[][] */
	$max_of_s = $S[0][0]; 
	$max_i = 0; 
	$max_j = 0; 
	for($i = 0; $i < $R; $i++) 
	{ 
		for($j = 0; $j < $C; $j++) 
		{ 
            if($max_of_s < $S[$i][$j]) 
            { 
                $max_of_s = $S[$i][$j]; 
                $max_i = $i; 
                $max_j = $j; 
            } 
		}
	} 
	
    printf("Maximum size sub-matrix is: ". $max_of_s*$max_of_s." <br>"); 
    printf("Maximum size sub-matrix is: <br>"); 
    for($i = $max_i; 
        $i > $max_i - $max_of_s; $i--) 
    {
        for($j = $max_j;
            $j > $max_j - $max_of_s; $j--) 
        {
            echo $M[$i][$j], " " ; 
        } 
        echo "<br>" ; 
    } 
} 

# Driver code 
$M = array(array(0, 1, 1, 0, 1), 
		array(1, 1, 1, 0, 1), 
		array(0, 1, 1, 1, 1), 
		array(1, 1, 1, 1, 1), 
		array(1, 1, 1, 1, 1), 
        array(0, 0, 0, 0, 0)); 

	
$R = count($M); 
$C = count($M[0]);	 
printMaxSubSquare($M, $R, $C); 
?> 