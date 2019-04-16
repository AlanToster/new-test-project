<? 

// Тут звязуємося із базою даних через цей файл. Там логін, пароль і назва бази.

include ("blocks/bd.php");

// Далі починаємо сессію. Вона несе в собі логін після твоєї авторизації на сайті

session_start();

// Тут ми звязуємося із таблицею settings в БД, де знаходится інформація про заголовки та основний текст для всіх сторінок сайту.

mysql_set_charset("utf8");
$result = mysql_query("SELECT title, text FROM settings WHERE page='index'",$db);

// Перевіряємо чи вдалося з*єднатися із базою

if (!$result)
{
echo "<p>Запит на взяття даних з бази не пройшов</p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)
{
$myrow = mysql_fetch_array($result);
}
else {
echo "<p>Інфорамція по запиту не може бути взята. В таблиці нема записів</p>";
exit();
}
// Тут стандартний текст для сторінки. Він є повсюду
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="text/html; charset=utf-8" http-equiv="content-type"/>

<!-- Тут ми вказуємо назву сторінки яку ми взяли з бази -->

<title><? echo $myrow["title"]; ?></title>

<link href="style.css" rel="stylesheet" type="text/css">


</head>

<body>
<table width="810"  class="cooltable0" align="center" bgcolor="#FFFFFF">

<!-- Підключаємо окремо шапку сайту та меню що під нею. Зайди у файл blocks/left.php -->

<? include ("blocks/header.php") ?>
<? include ("blocks/top-menu.php") ?>
  <tr>
    <td><table width="800" class="cooltable">
      <tr>
<? include ("blocks/left.php") ?>
        <td width="584" align="left" valign="top" class="cooltable0">
          <p><? echo $myrow["text"]; ?></p>
        </td>
      </tr>
    </table></td>
  </tr>
<? include ("blocks/footer.php") ?>
</table>



<div class="leftbar-wrap">
<a href="#" class="left-controlbar">
<span class="active-area">
<img class="bar-desc-top" src='img/up.png'></img></span></span></a>


</body>
</html>
