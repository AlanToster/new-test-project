<?php 
include ("blocks/bd.php");
session_start();
mysql_set_charset("utf8");
$result = mysql_query("SELECT title,text FROM settings WHERE page='puzz'",$db);
$myrow = mysql_fetch_array($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><?php echo $myrow['title'] ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="800"  class="cooltable0" align="center" bgcolor="#FFFFFF">

  <? include("blocks/header.php"); ?>
<? include ("blocks/top-menu.php") ?>
  <tr>
    <td><table width="800"  class="cooltable">
      <tr>
  
  <? include("blocks/left.php"); ?>
  

<td width="584" align="left" valign="top" class="cooltable0"><p><? echo $myrow["text"]; ?>
<p>
<?php
mysql_set_charset("utf8");
$result77 = mysql_query("SELECT str FROM options", $db);
$myrow77 = mysql_fetch_array($result77);
$num = $myrow77["str"];
// ��������� �� URL ������� ��������
@$page = $_GET['page'];
// ���������� ����� ����� ��������� � ���� ������
$result00 = mysql_query("SELECT COUNT(*) FROM data WHERE cat='2'");
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
// ������� ����� ����� �������
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
// ���������� ������ ��������� ��� ������� ��������
$page = intval($page);
// ���� �������� $page ������ ������� ��� ������������
// ��������� �� ������ ��������
// � ���� ������� �������, �� ��������� �� ���������
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// ��������� ������� � ������ ������
// ������� �������� ���������
$start = $page * $num - $num;
// �������� $num ��������� ������� � ������ $start
mysql_set_charset("utf8");
$result = mysql_query("SELECT id,title,description,date,author,mini_img,view,text FROM data WHERE cat='2' ORDER BY id DESC LIMIT $start, $num",$db);

//$result = mysql_query ("SELECT id,title,description,date,view,mini_img FROM data WHERE cat='2' ORDER BY id DESC", $db);


$myrow = mysql_fetch_array($result);


do {
if( $myrow["mini_img"] == "") {
$myrow["mini_img"] = "blocks/img/no_img.jpg";
}
echo "<table align='left' class='citaty' style='margin-left: 5px; width: 98%; margin-bottom: 10px; box-shadow: black; border: 1px solid #000000; box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.16);'>";
printf( "  		<tr>
    <td style='    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: rgba(0, 0, 0, 0.17);'>
		<p class='post_name'><img class='mini' align='left' src='%s'><a href='view_game.php?id=%s'>%s</a></p>
	
	
	</td>
  </tr>
  <tr>
    <td style='    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: rgba(0, 0, 0, 0.17);'>
	
		<p style='margin-bottom: 0px; margin-top: 0px;'>%s</p></td>
	
	</td>
  </tr>
  <tr>
    <td>
	
		<label class='post_adds'>Дата створення: %s</label>
		<label style='margin-left: 200px;'>Переглядів: %s</label>
	
	</td>
  </tr>
</table>", $myrow["mini_img"],$myrow["id"],$myrow["title"],$myrow["description"],$myrow["date"],$myrow["view"]);

}

while($myrow = mysql_fetch_array($result));






// ��������� ����� �� ������� �����
if ($page != 1) $pervpage = '<a href=puzzle.php?page=1>�����</a> | <a href=puzzle.php?page='. ($page - 1) .'>���������</a> | ';
// ��������� ����� �� ������� ������
if ($page != $total) $nextpage = ' | <a href=puzzle.php?page='. ($page + 1) .'>��������</a> | <a href=puzzle.php?page=' .$total. '>�������</a>';

// ������� ��� ��������� ������� � ����� �����, ���� ��� ����
if($page - 5 > 0) $page5left = ' <a href=puzzle.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a href=puzzle.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a href=puzzle.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a href=puzzle.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href=puzzle.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a href=puzzle.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a href=puzzle.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a href=puzzle.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a href=puzzle.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href=puzzle.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// ����� ���� ���� ������� ������ �����

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav\">";
echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
echo "</div>";
}

?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p></td>
      </tr>
    </table></td>
  </tr>
  <? include("blocks/footer.php"); ?>
</table>

<div class="leftbar-wrap">
<a href="#" class="left-controlbar">
<span class="active-area">
<img class="bar-desc-top" src='img/up.png'></img></span></span></a>

</body>
</html>