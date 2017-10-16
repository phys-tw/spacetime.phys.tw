<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>台大物理系刊《時空》</title>
</head>

<body><center>
<table width="760"><tr><td align="left">

<?php 

if($_GET['p']=="professor"){
    $filename = "professor_msgweb.txt";
    $subject = "台大物理系刊《時空》募款說明";
}

elseif($_GET['p']=="alumni"){
    $filename = "alumni_msgweb.txt";
    $subject = "來自台大物理系刊《時空》的問候";
}
else exit(0);


$text = fopen($filename, "r");
$contents = fread($text, filesize($filename));
fclose($text);
$message2 = nl2br($contents);
echo "<h3>$subject</h3><hr><p>$message2</p><br><br><br>";

?>

</td></tr></table></center>
</body>
