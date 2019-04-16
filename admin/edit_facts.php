<?php include ("blocks/bd.php");
include ("lock.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
<title>Сторінка для додавання нового уроку</title>

<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body>
<table width="810" class="cooltable0" align="center" bgcolor="#FFFFFF">
<? include ("blocks/header.php") ?>
<? include ("blocks/top-menu.php") ?>
  <tr>
    <td><table width="800" class="cooltable">
      <tr>
<? include ("blocks/left.php") ?>
        <td width="584" align="left" valign="top" class="cooltable0">

<?
mysql_set_charset("utf8");
$result = mysql_query("SELECT title,id FROM data");
$myrow = mysql_fetch_array($result);

do
{
printf ("<p><a href='edit_fact.php?id=%s'>%s</p>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysql_fetch_array($result));

?>
          
        </td>
      </tr>
    </table></td>
  </tr>
<? include ("blocks/footer.php") ?>
</table>
</body>
</html>
