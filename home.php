<?php session_start(); ?>
<?php require_once('Connections/myconnection.php'); ?>
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
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_showuser = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_showuser = $_SESSION['MM_Username'];
}
mysql_select_db($database_myconnection, $myconnection);
$query_showuser = sprintf("SELECT * FROM `admin` WHERE uesrname = %s", GetSQLValueString($colname_showuser, "text"));
$showuser = mysql_query($query_showuser, $myconnection) or die(mysql_error());
$row_showuser = mysql_fetch_assoc($showuser);
$totalRows_showuser = mysql_num_rows($showuser);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>E-Learning for Computer Network</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<style type="text/css">
body {
	background-color: #E7F7A8;
	background-attachment:fixed;
	background-image: url(picture/background.jpg);
	background-repeat: repeat;
}
</style>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
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

<body onload="MM_preloadImages('picture/menu1-2.jpg','picture/menu2-2.jpg','picture/menu3-2.jpg','picture/menu4-2.jpg','picture/menu5-2.jpg')">
<form id="form1" name="form1" method="post" action="">
  <table width="900" border="1" align="center">
    <tr>
      <td colspan="2"><img src="picture/banner.jpg" width="900" height="300" /></td>
    </tr>
    <tr>
      <td colspan="2"><a href="home.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','picture/menu1-2.jpg',1)"><img src="picture/menu1-1.jpg" name="Image2" width="180" height="50" border="0" id="Image2" /></a><a href="lesson.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','picture/menu2-2.jpg',1)"><img src="picture/menu2-1.jpg" name="Image3" width="180" height="50" border="0" id="Image3" /></a><a href="test.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','picture/menu3-2.jpg',1)"><img src="picture/menu3-1.jpg" name="Image4" width="180" height="50" border="0" id="Image4" /></a><a href="video.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','picture/menu4-2.jpg',1)"><img src="picture/menu4-1.jpg" name="Image5" width="180" height="50" border="0" id="Image5" /></a><a href="Provider.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image6','','picture/menu5-2.jpg',1)"><img src="picture/menu5-1.jpg" name="Image6" width="180" height="50" border="0" id="Image6" /></a></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#90CD1A"><marquee scrollamount="3" class="top">
�Թ�յ�͹�Ѻ������ ���͡�����¹����͹�͹�Ź� 
      </marquee></td>
    </tr>
    <tr>
      <td width="200" align="center" valign="top" bgcolor="#E7F7A8"><table width="200" border="0">
        <tr>
          <td width="200" align="center" class="create"><span class="top">���ͼ����&nbsp;<?php echo $row_showuser['uesrname']; ?></span></td>
        </tr>
      </table>
        <table width="200" border="0">
          <tr>
            <td align="center"><a href="<?php echo $logoutAction ?>"><img src="picture/exit.png" width="46" height="49" /><br />
            �͡�ҡ�к�</a></td>
          </tr>
        </table>
        <br />
        <img src="picture/menu L2.jpg" width="200" height="50" /><br />
        <table width="200" border="0" align="center">
          <tr>
            <td width="200"><ul id="MenuBar1" class="MenuBarVertical">
              <li><a href="lesson-1.php">����� 1 �к����͢��¤��������� </a>                </li>
              <li><a href="lesson-2.php">����� 2 �������ͧ�к����͢��¤���������</a>                </li>
              <li><a href="lesson-3.php">����� 3 Ẻ���ͧ OSI ����Ѻ���͢���</a></li>
              <li><a href="lesson-4.php">����� 4 �������� �Ϳ������ ��е�ǡ�ҧ���������â�����</a>                </li>
              <li><a href="lesson-5.php">����� 5 ����������Ф����Ӥѭ�ͧ�к���Ժѵԡ��</a></li>
              <li><a href="lesson-6.php">����� 6 ��ú������к����͢���</a>                </li>
              <li><a href="lesson-7.php">����� 7 �к����͢����Թ������</a>                </li>
            </ul></td>
          </tr>
        </table>
        <img src="picture/menu L1.jpg" width="200" height="50" /><br />
        <table width="200" border="0" align="center">
          <tr>
            <td><ul id="MenuBar2" class="MenuBarVertical">
              <li><a href="test1.php">����� 1 �к����͢��¤���������</a></li>
              <li><a href="test2.php">����� 2&nbsp;�������ͧ�к����͢��¤���������</a></li>
              <li><a href="lesson-3.php">����� 3 Ẻ���ͧ OSI ����Ѻ���͢���</a></li>
              <li><a href="test4.php">����� 4 �������� �Ϳ������ ��е�ǡ�ҧ���������â�����</a></li>
              <li><a href="test5.php">����� 5 ����������Ф����Ӥѭ�ͧ�к���Ժѵԡ��</a></li>
              <li><a href="test6.php">����� 6 ��ú������к����͢���</a></li>
              <li><a href="test7.php">����� 7 �к����͢����Թ������</a></li>
            </ul></td>
          </tr>
        </table>
        <br />
        <table width="150" border="0">
          <tr>
            <td><embed src=" http://www.blogclock.cn/swf/S100162af2b7476-4.swf" width="160px" height="200px" type="application/x-shockwave-flash" quality="high" wmode="transparent"></embed></td>
          </tr>
        </table>
      <br /></td>
      <td width="700" valign="top" bgcolor="#E7F7A8"><br />        <table width="550" border="0" align="center">
          <tr>
            <td width="500" align="center" class="top"><span class="top">�ش���ʧ������Ԫ�</span></td>
          </tr>
          <tr>
            <td width="500"><br />              
              1. ����������㨡�õԴ���������������ҧ���ä���������Ѻ�ػ�ó��Сͺ��ҧ � ���ѡ˹�ҷ�� ��С�÷ӧҹ�ͧ�ػ�ó�Դ��������������ҵðҹ��ҧ � �ͧ�ػ�ó����������к� Network<br />
2. �����������ö�Դ����ػ�ó��������� �����������ͤ���������������к����͢��·��������������� �¼�ҹ����� ������� ��� �������ö�������������˵آѴ��ͧ�ͧ���͢��¤���������<br />
3. ��������աԨ�����㹡�÷ӧҹ���¤�����гյ �ͺ�ͺ ��л�ʹ��� ���˹ѡ�֧�س�Ҿ�ͧ�ҹ����ը��¸���㹧ҹ�Ҫվ</td>
          </tr>
          <tr>
            <td width="500" height="30" class="top">&nbsp;</td>
          </tr>
          <tr>
            <td width="500" align="center" class="top">&nbsp;</td>
          </tr>
          <tr>
            <td width="500" height="77"><p>&nbsp;</p>
<p>&nbsp; </p></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#90CD1A"><marquee behavior="alternate"scrollamount="3" class="create">
        Create  by Jidapa,Poramin,Prutya Business Computer
       Rajapark Institute
      </marquee></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
<?php
mysql_free_result($showuser);
?>
