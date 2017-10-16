<?php
$folder = array('', '1_main1', '2_main2', '3_series1', '4_series2', '5_art_design', '6_other');
$uploaddir = $folder[(int)$_GET['g']];
$filename = $_GET['f'];
$uploadhttp = "http://phys.tw/~spacetime/v31/upload/$uploaddir/$filename";
echo "<script>location.href='./upload/$uploaddir/$filename';</script>";
?>
<html></html>