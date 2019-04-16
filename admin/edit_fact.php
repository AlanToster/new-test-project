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
$result1 = mysql_query("SELECT cat FROM data WHERE id='$id'");
$myrow1 = mysql_fetch_array($result1);

if( $myrow1['cat'] == "1") {$idz = "Кросворди";}
if( $myrow1['cat'] == "2") {$idz = "Пазли";}
if( $myrow1['cat'] == "3") {$idz = "Афоризми";}
if( $myrow1['cat'] == "4") {$idz = "Анекдоти";}
if( $myrow1['cat'] == "5") {$idz = "Цитати";}
if( $myrow1['cat'] == "6") {$idz = "Цікаві факти";}

$result = mysql_query("SELECT * FROM data WHERE id=$id");
$myrow = mysql_fetch_array($result);

if( $myrow["mini_img"] == "") {
$myrow["mini_img"] = "blocks/img/no_img.jpg";
}
?>
<form action=update.php method=post enctype=multipart/form-data>
<p class="style1">
  <label>Тип: <? echo $idz; ?>
  </label>
</p>
<p class="style1">
  <label>Назва:
    <br>
                <input name="title" type="text" id="title" value="<? echo $myrow['title']; ?>">
    </label>
</p>
<p class="style1">
              <label>Короткий опис: <br>
              <textarea name="description" id="description" cols="45" rows="5"><? echo $myrow['description']; ?></textarea>
              </label>
            </p>
            <p class="style1">
              <label>Текст: <br>
              <textarea name="text" id="text" cols="45" rows="10"><? echo $myrow['text']; ?></textarea>
              </label>
            </p>
            <p>Фото: <br>
              <input type=file name=uploadfile>
            </p>
            <p><img style="height: 100px;" src="<? echo "http://localhost/new-php-site.ua/".$myrow['mini_img']; ?>"></p>
            <p>
              <input type="hidden" name="old_foto" id="old_foto" value="<? echo $myrow['mini_img']; ?>">
            </p>
            <p>
              <label>Посилання на гру (для Кросвордів та Пазлів):<br>
              <input name="url" type="text" id="url" value="<? echo $myrow['url']; ?>">
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
