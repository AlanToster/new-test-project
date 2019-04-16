<? include ("blocks/bd.php");
session_start();

// Тут ми отримуємо текст який ти ввів і заносимо його в змінну $search

if (isset($_POST['submit_s']))
{
$submit_s = $_POST['submit_s'];
}

if (isset($_POST['search']))
{
$search = $_POST['search'];
}

if (isset($submit_s))
{

// Якщо $search < 4 (тобто в запиті менше 4 букв, то пошук не виконується)

if (empty($search) or strlen($search) < 4)
{
exit ("<p>Пошуковий запит не був заданий, або він менший за 4 символи.</p>");
}

$search = trim($search);
$search = stripslashes($search);
$search = htmlspecialchars($search);

}

else 
{
exit("<p>Ви звернулись до файлу без необхідних параметрів.</p>");
}




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="800"  class="cooltable0" align="center" bgcolor="#FFFFFF">

  <? include("blocks/header.php"); ?>
<? include ("blocks/top-menu.php") ?>
  <tr>
    <td><table width="800"  class="cooltable" class="cooltable0">
      <tr>
       <? include ("blocks/left.php"); ?>
        <td valign='top'>
       
        <p>Результати запиту</p>
<? 
		// Якщо $search >4 то все ок. Ми робимо наступне
		// З таблиці data (де в тебе знаходяться всііііі дані) ми беремо поля title (назва), description(опис) та text (текст) і шукаємо в них цей текст $search
		
		
		
		$result = mysql_query("SELECT title, text, description FROM data WHERE 
		MATCH(title) AGAINST('$search') OR
		MATCH(text) AGAINST('$search') OR
		MATCH(description) AGAINST('$search')", $db);
        
// Перевіряємо чи пройшов запит у базу
		
if (!$result)
{
echo "<p>Запит на вибірку даних з бази не пройшов.</p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

// Якщо все добре - то виводимо результати. Кожен окремо.

// Якщо у новини, гри, загадки чи ще чогось нема картинки - то ми замість неї ставимо фото з "blocks/img/no_img.jpg"

do 
{
if( $myrow["mini_img"] == "") {
$myrow["mini_img"] = "blocks/img/no_img.jpg";
}

// Якщо запит був знайдений у категоріях 1 або 2 (ігри) то виводимо для них цей шаблон

if($myrow["cat"] == 1 or  $myrow["cat"] == 2) {
printf("
<table align='left' class='citaty' style='margin-left: 5px; width: 500px; margin-bottom: 10px; box-shadow: black; border: 1px solid #000000; box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.16);'>
  <tr>
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

} else {

// Якщо 3 (загадки) то такий шаблон

if($myrow["cat"] == 3) {

echo "<table align='left' class='citaty' style='margin-left: 5px; width: 98%; margin-bottom: 10px; box-shadow: black; border: 1px solid #000000; box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.16);'>";
printf( "  		<tr>
    <td style='    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: rgba(0, 0, 0, 0.17);'>
		<p class='post_name'><img class='mini' align='left' src='%s'><a href='view_zag.php?id=%s'>%s</a></p>
	
	
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
}else{

// Якщо всі інші - то цей шаблон

printf("
<table align='left' class='citaty' style='margin-left: 5px; width: 500px; margin-bottom: 10px; box-shadow: black; border: 1px solid #000000; box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.16);'>
  <tr>
    <td style='    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: rgba(0, 0, 0, 0.17);'>
		<p class='post_name'><img class='mini' align='left' src='%s'><a href='view_facts.php?id=%s'>%s</a></p>
	
	
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
}

}
while ($myrow = mysql_fetch_array($result));


}

else
{
echo "<p>Інформація по запиту не може бути взята. В таблиці немає записів.</p>";
exit();
}
// Тепер відкрий файл zag.php

?>
        
        </td>
      </tr>
    </table></td>
  </tr>
  <? include ("blocks/footer.php"); ?>
</table>

<div class="leftbar-wrap">
<a href="#" class="left-controlbar">
<span class="active-area">
<img class="bar-desc-top" src='img/up.png'></img></span></span></a></div>

</body>
</html>
