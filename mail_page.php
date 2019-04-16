<?php 
include ("blocks/bd.php");
session_start();
mysql_set_charset("utf8");
$result = mysql_query("SELECT title,text FROM settings WHERE page='mail_page'",$db);
$myrow = mysql_fetch_array($result);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $myrow['title'] ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="800" class="cooltable0" align="center" bgcolor="#FFFFFF">

  <? include("blocks/header.php"); ?>
<? include ("blocks/top-menu.php") ?>
  <tr>
    <td><table width="800" class="cooltable">
      <tr>
  
  <?  include("blocks/left.php"); ?>
  

<td width="584" align="left" valign="top" class="cooltable0"><p><? echo $myrow["text"]; ?></p>



   <form action="sendmail.php" method="post" style="
    border: 1px solid gray;
    width: 95%;
    margin-left: 5px;">
   <p><label>Ім'я: <br>
   </label><input name="namex" type="text" value="<? echo $_SESSION['login'] ?>"></p>
   <p><label>Пошта: <br>
   </label><input name="e-mailx" type="text" value=""></p>
   <p><label>Тема: <br>
   </label><input name="themx" type="text" value=""></p>
   
   <p><label>Текст: <br>
     </label><textarea name="textx" id="textx" cols="20" rows="5"></textarea></p>
   <p>
     <label>
     <input type="submit" name="buttonxxx" id="buttonxxx" value="Надіслати">
     </label>
   </p>
  </form>



</td>
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
