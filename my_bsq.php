<?php 
$file = $argv[1];
$copy = [];
$max = 0; 
error_reporting(0);
foreach (file($file) as $row => $value)
{
    if ($row == 0) {
    $max_row = trim($value);
    }
    else {
        ($row == $max_row ? $plus = 2 : $plus = 0);
        for($i = 0; $i <  strlen($value) + $plus - 2; ++$i) {
        $max_line = strlen($value);
        //  $copy[$row][$i] = $value[$i];  
        if ($value[$i] == ".") {
        $copy[$row][$i] = 1;  
        }
        else {
             $copy[$row][$i] = 0; 
        }
        }
    }        
}



// $cache = $copy;
// $max = 0;
for ($i = 1; $i <= $max_row; $i++) {
  for ($j= 0; $j < $max_line; $j++) {
      echo $copy[$i][$j];
    // if ($i != 0 && $j != 0  && $copy[$i][$j] > 0){
    //     $cache[$i][$j] = 1 + min($cache[$i][$j-1],$cache[$i-1][$j],$cache[$i-1][$j-1]);
    //  }
    // if ($cache[$i][$j] > $max) $max = $cache[$i][$j];
}
 echo "\n";
}
//   echo "\n";
//   echo "\n";  echo "\n";
//   echo "\n";
// for ($k = 1; $k <= $max_row; $k++) {
//   for ($l= 0; $l < $max_line; $l++) {
//     echo $cache[$k][$l];
// }
//   echo "\n";
// }
// echo $max;
?> 
