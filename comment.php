<?php  include ("blocks/bd.php");

if (isset($_POST['author']))
{
$author = $_POST['author'];
}

if (isset($_POST['text']))
{
$text = $_POST['text'];
}

if (isset($_POST['pr']))
{
$pr = $_POST['pr'];
}

if (isset($_POST['sub_com']))
{
$sub_com = $_POST['sub_com'];
}

if (isset($_POST['id']))
{
$id = $_POST['id'];
}
if (isset($_POST['url']))
{
$url = $_POST['url'];
}

if (isset($sub_com))
{
if (isset($author)) {trim($author);   }
else {$author = "";}

if (isset($text)) {trim($text);   }
else {$text = "";}

if (empty($author) or empty($text))
{
exit ("Ви ввели не всю інформацію, повеніться назад і заповніть всі поля.");
}

$author = stripslashes($author);
$text = stripslashes($text);
$author = htmlspecialchars($author);
$text = htmlspecialchars($text);

$result = mysql_query ("SELECT sum FROM comments_setting",$db);
$myrow = mysql_fetch_array($result);

if ($pr == $myrow["sum"])
{
$date = date("Y-m-d");
$result2 = mysql_query ("INSERT INTO comments (post,author,text,date) VALUES ('$id','$author','$text','$date')",$db);
$address = "admin@mail.ru";
$subject = "Новий коментар";
$result3 = mysql_query ("SELECT title FROM data WHERE id='$id'",$db);
$myrow3 = mysql_fetch_array ($result3);
$post_title = $myrow3["title"];
$message = "Появился комментарий к заметке";
mail($address,$subject,$message,"Content-type:text/plain; Charset=windows-1251\r\n");


$resultz = mysql_query("SELECT * FROM data WHERE id='$id'",$db);
$myrowz = mysql_fetch_array($resultz);

if($myrowz["cat"] == "1" or $myrowz["cat"] == "2") {
echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=view_game.php?id=$id'>
</head></html>";
exit();
}
else{
echo "<html><head>
<meta http-equiv='Refresh' content='0; URL=view_facts.php?id=$id'>
</head></html>";
exit();
}



}
else 
{
exit ("<p>Вы ввели неверную сумму цифр с картинки на предыдущей странице. <br> <input name='back' type='button' value='Вернуться назад' onclick='javascript:self.back();'>");
}










}

?>