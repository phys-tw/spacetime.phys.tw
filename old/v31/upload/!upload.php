<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>�ɮפW�Ǩt��</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<style type="text/css">
<!--
p {
	margin-left: 18px;
}
-->
</style>
</HEAD>
<BODY>

<?php
$folder = array('', '1_main1', '2_main2', '3_series1', '4_series2', '5_art_design', '6_other');

if($_GET['upload']==1){

if($_POST['password']=='st31upload'){

$group = (int)$_POST['group'];
$uploaddir = $folder[$group] . '/';
$path_parts = pathinfo($_FILES['userfile']['name']);
$newfilename = basename($path_parts['basename'], ("." . $path_parts['extension'])) . date("_mdHis.", time()) . $path_parts['extension'];
$uploadfile = $uploaddir . $newfilename;
$uploadhttp = "http://phys.tw/~spacetime/v31/s.php?g=$group&f=$newfilename";

if(file_exists($uploadfile))
	echo "<p><font color='red'>���ɮפw�s�b�A�Э��s�R�W�z���ɮ׫�A�A�դ@���C</font></p><hr>";

elseif(preg_match('/[\/][\w\-\._&\+]+$/', $uploadfile)==0)
	echo "<p><font color='red'>�ɦW�ФŨϥΤ���ίS��r���A�Э��s�R�W�z���ɮ׫�A�A�դ@���C</font></p><hr>";

else{
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
		echo "<p><font color='blue'><b>�ɮפw���\�W�ǡI</b></font></p>";
		echo '<p><b>�ɮצ�m�G</b><a href="' . $uploadhttp . '" target="_blank">' . $uploadhttp . '</a></p><hr>';
	
	}
	else echo "<p><font color='red'>�W�ǥ��ѡA�ЦA�դ@���C</font></p><hr>";
}
}

else  echo "<p><font color='red'>�W�ǱK�X���~</font></p><hr>";

}

?>
<script>
function check(){

var filename_pattern = new RegExp(/[\/\\]?[\w\-\._&\+]+$/);
var filename = document.getElementById('userfile').value;
var group = document.getElementById('group').value;

if(group=="0"){
    alert('�п�ܲէO�I');
    return false;
}

if(filename.match(filename_pattern)) {
    document.getElementById('waitmsg').style.display='';
    document.getElementById('wrongname').style.display='none';
    return true;
}
else{
    document.getElementById('waitmsg').style.display='none';
    document.getElementById('wrongname').style.display='';
    return false;
}
}
</script>

<span style="display:none;" id="wrongname"><p><font color='red'>�ɦW�ФŨϥΤ���ίS��r���A�Э��s�R�W�z���ɮ׫�A�A�դ@���C</font></p><hr></span>
<span style="display:none;" id="waitmsg"><p><font color='blue'><b>�W�Ǥ��A�еy��........</b></font></p><hr></span>

<p><b>�ɪŢ��� �ɮפW�Ǩt��</b>�@�@�@<i>by maomao</i></p>
<form enctype="multipart/form-data" action="!upload.php?upload=1" method="POST" onsubmit="return check();">
<input type="hidden" name="MAX_FILE_SIZE" value="150000000">
<p>�ɮ׸��|�G<input name="userfile" id="userfile" type="file"></p>
<p>�W�ǱK�X�G<input name="password" type="password"></p>
<p>�@�@�էO�G
<select name="group" id="group">
<option value=0>�п�ܲէO</option>
<option value=1>�M�@</option>
<option value=2>�M�G</option>
<option value=3>�t�@</option>
<option value=4>�t�G</option>
<option value=5>���s</option>
<option value=6>��L</option>
</select>
</p>
<p>�Ъ`�N�A�ɦW�ФŨϥΤ���ίS��r���C<br>
<font color="darkgreen"><b>�ۦP�ɮסB�u�O�������P�A�W�Ǯɥi�άۦP�ɦW�A�t�η|�۰ʥ[���ɶ��C</b></font></p>
<p><input type="submit" value="�W���ɮ�">�@<input type="button" value="�^�ɮצC��" onclick="location.href='./';"></p>
</form>

</BODY>
</HTML>
