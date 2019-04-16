<?php 
include ("blocks/bd.php");
session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
if (isset($_POST['password1'])) { $password1=$_POST['password1']; if ($password1 =='') { unset($password1);} }
if (isset($_POST['password2'])) { $password2=$_POST['password2']; if ($password2 =='') { unset($password2);} }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>save_user</title>
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
  

<td width="584" align="left" valign="top" class="cooltable0"><p>
<p>

<?
if (empty($login) or empty($password1) or empty($password2)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Ви надали не всю інформацію! Поверніться назад та заповніть всі поля!");
    }



if( $password1 == $password2){

$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Вибачте, але введений вами логін уже зареєстрований. Виберіть інший логін.");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO users (login,pass) VALUES('$login','$password1')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "Ви успішно зареєструвалися! Тепер ви можете увійти на сайт щоб добавити нові записи!<a href='login.php'>Увійти</a>";
    }
 else {
    echo "Помилка! Ви не зареєстровані.";
    }








} else {
echo "Не совпадают!";
}
?>

</p></td>
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