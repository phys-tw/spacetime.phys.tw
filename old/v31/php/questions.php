<?php

$totalnum = 8;
$randnum = rand(0, $totalnum-1);

$key = array(
    'pNGhKAysAmxlgUEf7VsREGw',
    'pNGhKAysAmxkIiA0Ls4bQdQ',
    'pNGhKAysAmxmlwEfVF4RZag',
    'pNGhKAysAmxkOSbAC_35dGw',
    'pNGhKAysAmxkzw5itv7TzOQ',
    'pNGhKAysAmxlrgaKaBCoWJA',
    'pNGhKAysAmxlJ1-uiYwmyKQ',
    'pNGhKAysAmxnA4C0hBK5CYg'
    );

$url = 'http://spreadsheets.google.com/viewform?key=' . $key[$randnum];
echo "<script>location.href='$url';</script>";

?>
