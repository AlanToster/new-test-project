<?
include ("blocks/bd.php");


// Тут ми підключаємося до баз із демо даними про всі записи та коментарі. Ми вираховуємо кількість записів у кожній базі і виводио їх.
// 

$result999 = mysql_query("SELECT id FROM data_in_m");
$num_rows = mysql_num_rows($result999);

$result_c = mysql_query("SELECT id FROM comments_t");
$num_c = mysql_num_rows($result_c);

?>

<td class="cooltable0" valign="top" width="200">
    <p alight="center" class="title">Замітки</p>
    <div id="coolmenu">
        <a href="new_fact.php">Додати</a>
        <a href="edit_facts.php">Редагувати</a>
        <a href="del_fact.php">Видалити</a>
    </div>
    <p alight="center" class="title">Статичний текст</p>
    <div id="coolmenu">
        <a href="edit_texts.php">Редагувати</a>
    </div>
    
    <p alight="center" class="title">Модерація</p>
    <div id="coolmenu">
		
	<!-- Тут виводимо -->
	
        <a href="edit_m.php">Нові записи (<? echo $num_rows; ?>)</a>
    </div>
	<div id="coolmenu">
	
	<!-- Тут виводимо -->
	
        <a href="edit_comments.php">Нові коментарі (<? echo $num_c; ?>)</a>
		
		
	<!-- Відкрий файд edit_m.php -->
	
    </div>
</td>