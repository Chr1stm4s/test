<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>E-Learning for Computer Network</title>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
<style type="text/css">
body {
	background-color: #D4E862;
	background-attachment:fixed;
	background-image: url();
	background-repeat: repeat;
}
</style>
<style type="text/css">
a:link {
	color: #000;
	text-decoration: none;
}
a:hover {
	color: #F00;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:active {
	text-decoration: none;
	color: #000;
}
.top {
	font-family: "Comic Sans MS", cursive;
}
.top {
	font-size: 25px;
	font-family: boonjot;
}
.create {
	font-family: boonjot;
}
.create {
	font-size: 18px;
}
from {
	font-family: boonjot;
}
from {
	font-size: 20px;
}
from {
	font-family: boonjot;
}
#form1 table tr td table tr td p {
	font-family: boonjot;
}
#form1 table tr td table tr td p {
	font-size: 20px;
}
from1 {
	font-family: boonjot;
}
from1 {
	font-size: 23px;
}
m001 {
	font-family: boonjot;
}
from01 {
	font-family: boonjot;
}
from01 {
	font-size: 20px;
}
#form1 table tr td table tr td {
	font-family: boonjot;
	font-size: 20px;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="900" border="0" align="center">
    <tr>
      <td><img src="picture/index.jpg" width="900" height="600" border="0" usemap="#Map" /></td>
    </tr>
  </table>
</form>

<map name="Map" id="Map">
  <area shape="rect" coords="474,477,713,536" href="login.php" />
</map>
</body>
</html>
