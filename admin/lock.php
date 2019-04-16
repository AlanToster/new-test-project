<?php include("blocks/bd.php");

// Коли ти зайшов на одну із сторінок адміністрації то змінна $_SERVER['PHP_AUTH_USER'] яка містить твій логін - пуста
// Тому вискакує вікно із вводом пароля. 

if(!isset($_SERVER['PHP_AUTH_USER']))
{
Header("WWW-Authenticate: Basic realm=\"Admin Page\"");
Header("HTTP/1.0 401 Unauthorized");
exit();
}
else{
if(!get_magic_quotes_gpc()){
$_SERVER['PHP_AUTH_USER']=mysql_escape_string($_SERVER['PHP_AUTH_USER']);
$_SERVER['PHP_AUTH_PW']=mysql_escape_string($_SERVER['PHP_AUTH_PW']);
}

// Дані адміністратора знаходяться в таблиці userlist. Якщо дані сходяться - то тебе пускає на сторінки і твій $_SERVER['PHP_AUTH_USER'] = admin. Якщо не сходяться - не пускає.
// Відкрий файл left.php в папці blocks

$query="SELECT pass FROM userlist WHERE user='".$_SERVER['PHP_AUTH_USER']."'";
$lst=@mysql_query($query);
if(!$lst)
{
Header("WWW-Authenticate: Basic realm=\"Admin Page\"");
Header("HTTP/1.0 401 Unauthorized");
exit();
}
if(mysql_num_rows($lst)==0)
{
Header("WWW-Authenticate: Basic realm=\"Admin Page\"");
Header("HTTP/1.0 401 Unauthorized");
exit();
}
$pass=@mysql_fetch_array($lst);
if($_SERVER['PHP_AUTH_PW']!= $pass['pass'])
{
Header("WWW-Authenticate: Basic realm=\"Admin Page\"");
Header("HTTP/1.0 401 Unauthorized");
exit();
}
}
?>