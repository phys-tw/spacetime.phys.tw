<?php

$namelist = fopen("alumni.txt", "r");
#$text = fopen("professormsg.txt", "r");
#$contents = fread($text, filesize("professormsg.txt"));

$subject = "Greeting and request from NTU Physics SpaceTime 31";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/plain;' . "\r\n";
$headers .= 'From: SpaceTime NTU <ntuspacetime@gmail.com>' . "\r\n";
$headers .= 'Reply-To: SpaceTime NTU <ntuspacetime@gmail.com>' . "\r\n";

while ($userinfo = fscanf($namelist, "%s\t%s\t%s\n")) {
	list ($position, $name, $to) = $userinfo;

	$message = "To Whom It May Concern,\n\n";
    $message .= "We are the SpaceTime editors. We have sent a mail from SpaceTime NTU in Chinese with UTF-8 encoding. If you cannot read the previous mail, please visit the following webpage: \n";
    $message .= "http://phys.tw/~spacetime/v31/php/greeting.php?p=alumni \n\n";
    $message .= "If you already read the previous mail, please ignore this one. Sorry for your inconvenience.\n\n";
    $message .= "Sincerely, \nYaoyuan Mao \n(on behalf of SpaceTime Editor-in-Chief)";
	#mail($to, $subject, $message, $headers);
 	#$message2 = nl2br($message);
	#if(mail($to, $subject, $message, $headers))
	#echo "<p>$message2</p><hr>";

}

fclose($namelist);
#fclose($text);

echo "done";

?>
