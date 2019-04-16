<!-- Блок Меню із ссилками на кожен з розділів. Вони між собою однакові, просто запити до бази відрізняються -->

<td class="cooltable0" valign="top" width="200">
    <p alight="center" class="title">Меню</p>
    <div id="coolmenu">
        <a href="cross.php">Кросворди</a>
        <a href="puzzle.php">Пазли</a>
        <a href="zag.php">Загадки</a>
        <a href="joke.php">Анекдоти</a>
        <a href="quote.php">Цитати</a>
        <a href="facts.php">Цікаві факти</a>
    </div>

<!-- Блок Архів -->	
  
   <p alight="center" class="title">Архів</p>
   <div id="coolmenu">
<?

// Запитом витягуємо всі дати із бази

$result9 = mysql_query("SELECT DISTINCT left(date,7) AS month FROM data ORDER BY month DESC",$db);

// Переряємо чи пройшов запит

if (!$result9)
{
echo "<p>Запит на взяття даних з бази не пройшов</p>";
exit(mysql_error());
}

if (mysql_num_rows($result9) > 0)
{
$myrow9 = mysql_fetch_array($result9);

// Наповнюємо цей блок даними по датам

do
{
if( $myrow9["month"] != "0000-00") {
printf("<p><a class='nav_link' href='view_date.php?date=%s'>%s</a></p>",$myrow9["month"],$myrow9["month"]);
}
}
while ($myrow9 = mysql_fetch_array($result9));
echo "<hr>";
}
else {
echo "<p>Інфорамція по запиту не може бути взята. В таблиці нема записів</p>";
exit();
}

?>
   </div>
   
   
   
  

  
  <!-- Пошук. Цей блок лише бере текст що ти ввів і передає його файлу view_search.php -->
  
      <p alight="center" class="title">Пошук</p>
      
<form action="view_search.php" method="post" name="form_s">
 
 <p class="search_t">Пошуковий запит не може бути меншим 4-х символів.</p>
 <p><input name="search" type="text" size="25" maxlength="40">
 <br>
 <input class="search_b" name="submit_s" type="submit" value="Знайти">
 </p>
 
 </form>
 
   <!-- А це у нас поле для додавання нових заміток. Після авторизації в змінну $_SESSION['login'] попадає твій логін, а в змінну $_SESSION['id'] твій ID. А цей блок бачать лише ті, хто авторизувались -->
 <!-- Відкрий файл view_search.php (нагадаю він для пошуку даних по сайту) -->
 <? 
		if (empty($_SESSION['login']) or empty($_SESSION['id'])){}else{
		echo "
		 <p alight='center' class='title'>Додати нову замітку!</p>
    <div id='coolmenu'>
        <a href='add_new.php'>Створити</a>
    </div>
		";
		}
		?>
 

 
 
 
</td>