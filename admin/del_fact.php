<?php include ("blocks/bd.php");
include ("lock.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
<title>Сторінка для видалення нового уроку</title>

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
<p>Виберіть статтю для видалення</p>
<form action="drop_fact.php" method="post">
<?

$result = mysql_query("SELECT title,id,cat,text FROM data ORDER BY id DESC");
$myrow = mysql_fetch_array($result);

do
{
if( $myrow["cat"] == "3") {
$txt = mb_substr($myrow["text"], 0, 50,'UTF-8');
$myrow["title"] = "[Афоризм] ".$txt."...";
}
printf ("<p><input name='id' type='radio' value='%s'><lable> %s</label></p>",$myrow["id"],$myrow["title"]);
}
while ($myrow = mysql_fetch_array($result));

?>

<p><input name="submit" type="submit" value="Видалити"></p>
</form>
          
        </td>
      </tr>
    </table></td>
  </tr>
<? include ("blocks/footer.php") ?>
</table>
</body>
</html>
