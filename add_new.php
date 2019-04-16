<?php 
include ("blocks/bd.php");
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Сторінка для додавання новин</title>
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
  

<td width="584" align="left" valign="top" class="cooltable0">
<?
if( $_SESSION['login'] == ""){
echo '<script type="text/javascript">
window.location = "index.php"
</script>';
}
?>
<form action=add_to_m.php method=post enctype=multipart/form-data>
<center><strong><p class="style1">Зверніть увагу! Ваш запис буде добавлений лише після розгляду адміністрацією!</p></strong></center>
<p class="style1">
  <label>Тип: 
    <select name="droplist" id="cat">
      <option value="6">Цікаві факти</option>
      <option value="5">Цитати</option>
      <option value="3">Загадки</option>
      <option value="4">Анекдоти</option>
      <option value="1">Кросворди</option>
      <option value="2">Пазли</option>
      </select>
    </label>
</p>
<p class="style1">
  <label>Назва:
    <br>
                <input type="text" name="title" id="title">
    </label>
</p>
<p class="style1">
              <label>Короткий опис: <br>
              <textarea name="description" id="description" cols="45" rows="5"></textarea>
              </label>
            </p>
            <p class="style1">
              <label>Текст: <br>
              <textarea name="text" id="text" cols="45" rows="10"></textarea>
              </label>
            </p>
            <p>Фото: <br>
              <input type=file name=uploadfile>
            </p>
            <p>
              <label>Посилання на гру (для Кросвордів та Пазлів):<br>
              <input name="url" type="text" id="url" value="http://...">
              </label>
            </p>
            <p>
              <input type="hidden" name="author" id="author" value="<? echo $_SESSION['login']; ?>">
            </p>
            <p>
              <label>
                <input type="submit" name="submit" id="submit" value="Готово">
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
