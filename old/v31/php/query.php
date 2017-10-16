<?php

$randnum = rand(1, 2);

switch ($randnum){
case 1:
    $url='http://phys.tw/~spacetime/all.htm';
    break;
case 2:
    $url='http://tw.php.net/rand';
    break;
case 3:
    $url='';
    break;

}

echo "<script>location.href='$url';</script>"

?>

