<?php include ("blocks/bd.php");
include ("lock.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}

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
$result = mysql_query("SELECT * FROM settings WHERE id=$id");
$myrow = mysql_fetch_array($result);

?>
<form action=update_text.php method=post enctype=multipart/form-data>
<p class="style1">
  <label>Назва:
    <br>
                <input name="title" type="text" id="title" value="<? echo $myrow['title']; ?>">
    </label>
</p>
            <p class="style1">
              <label>Текст: <br>
              <textarea name="text" cols="45" rows="10" id="text"><? echo $myrow['text']; ?></textarea>
              </label>
            </p>
            <p>
              <input type="hidden" name="id" id="id" value="<? echo $id; ?>">
            </p>
            <p>
              <label>
                <input type="submit" name="submit" id="submit" value="Змінити">
                </label>
            </p>
          </form>
          
        </td>
      </tr>
    </table></td>
  </tr>
<? include ("blocks/footer.php") ?>
</table>
</body>
</html>
