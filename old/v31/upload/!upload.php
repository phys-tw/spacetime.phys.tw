<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>檔案上傳系統</TITLE>
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
	echo "<p><font color='red'>此檔案已存在，請重新命名您的檔案後，再試一次。</font></p><hr>";

elseif(preg_match('/[\/][\w\-\._&\+]+$/', $uploadfile)==0)
	echo "<p><font color='red'>檔名請勿使用中文或特殊字元，請重新命名您的檔案後，再試一次。</font></p><hr>";

else{
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)){
		echo "<p><font color='blue'><b>檔案已成功上傳！</b></font></p>";
		echo '<p><b>檔案位置：</b><a href="' . $uploadhttp . '" target="_blank">' . $uploadhttp . '</a></p><hr>';
	
	}
	else echo "<p><font color='red'>上傳失敗，請再試一次。</font></p><hr>";
}
}

else  echo "<p><font color='red'>上傳密碼錯誤</font></p><hr>";

}

?>
<script>
function check(){

var filename_pattern = new RegExp(/[\/\\]?[\w\-\._&\+]+$/);
var filename = document.getElementById('userfile').value;
var group = document.getElementById('group').value;

if(group=="0"){
    alert('請選擇組別！');
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

<span style="display:none;" id="wrongname"><p><font color='red'>檔名請勿使用中文或特殊字元，請重新命名您的檔案後，再試一次。</font></p><hr></span>
<span style="display:none;" id="waitmsg"><p><font color='blue'><b>上傳中，請稍候........</b></font></p><hr></span>

<p><b>時空３１ 檔案上傳系統</b>　　　<i>by maomao</i></p>
<form enctype="multipart/form-data" action="!upload.php?upload=1" method="POST" onsubmit="return check();">
<input type="hidden" name="MAX_FILE_SIZE" value="150000000">
<p>檔案路徑：<input name="userfile" id="userfile" type="file"></p>
<p>上傳密碼：<input name="password" type="password"></p>
<p>　　組別：
<select name="group" id="group">
<option value=0>請選擇組別</option>
<option value=1>專一</option>
<option value=2>專二</option>
<option value=3>系一</option>
<option value=4>系二</option>
<option value=5>美編</option>
<option value=6>其他</option>
</select>
</p>
<p>請注意，檔名請勿使用中文或特殊字元。<br>
<font color="darkgreen"><b>相同檔案、只是版本不同，上傳時可用相同檔名，系統會自動加註時間。</b></font></p>
<p><input type="submit" value="上傳檔案">　<input type="button" value="回檔案列表" onclick="location.href='./';"></p>
</form>

</BODY>
</HTML>
