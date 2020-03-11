<?php 
class MaximalSquare
{
	public function maxOnes($matrix) 
	{ 
		$square = [[]] ;
		$rows = count($matrix);
		$columns = count($matrix[0]);

		for($i = 0; $i < $rows; $i++) {
			$square[$i][0] = $matrix[$i][0]; 
		}
		
		for($j = 0; $j < $columns; $j++) {
			$square[0][$j] = $matrix[0][$j]; 
		}
		
		for($i = 1; $i < $rows; $i++) { 
			for($j = 1; $j < $columns; $j++) 
			{ 
				if($matrix[$i][$j] == 1) 
					$square[$i][$j] = min($square[$i][$j - 1], 
									$square[$i - 1][$j], 
									$square[$i - 1][$j - 1]) + 1; 
				else
					$square[$i][$j] = 0; 
			}
		}
		$maxOfOnes = $square[0][0];
		$maxRow = 0; 
		$maxColumn = 0; 
		for($i = 0; $i < $rows; $i++) 
		{ 
			for($j = 0; $j < $columns; $j++) 
			{ 
				if($maxOfOnes < $square[$i][$j]) 
				{ 
					$maxOfOnes = $square[$i][$j]; 
					$maxRow = $i; 
					$maxColumn = $j; 
				} 
			}
		} 
		
		echo "Maximum ones in matrix is: ". $maxOfOnes * $maxOfOnes." <br>"; 
		for($i = $maxRow; 
			$i > $maxRow - $maxOfOnes; $i--) 
		{
			for($j = $maxColumn;
				$j > $maxColumn - $maxOfOnes; $j--) 
			{
				echo $matrix[$i][$j], " " ; 
			} 
			echo "<br>" ; 
		}
	} 
}

$matrix = [[0, 1, 1, 0, 1], 
          [1, 1, 1, 0, 1], 
          [0, 1, 1, 1, 1], 
          [1, 1, 1, 1, 1], 
          [1, 1, 1, 1, 1], 
	      [0, 0, 0, 0, 0]];

$square = new MaximalSquare;
$square->maxOnes($matrix);
?> 