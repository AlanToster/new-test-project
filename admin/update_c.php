<?
include ("blocks/bd.php");
include ("lock.php");

if (isset($_POST['author'])) {$author = $_POST['author']; if ($author == '') {unset($author);}}
if (isset($_POST['text'])) {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['date'])) {$date = $_POST['date']; if ($date == '') {unset($date);}}
if (isset($_POST['post'])) {$post = $_POST['post']; if ($post == '') {unset($post);}}


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
<title>Обробка</title>

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
$result_c = mysql_query("SELECT id FROM comments");
$num_c = mysql_num_rows($result_c);

$id = $num_c + 1;

  
	if (isset($author) && isset($text)) {
		mysql_set_charset("utf8");
	$result = mysql_query ("INSERT INTO comments (id, author, text, date, post) VALUES ('$id', '$author', '$text', '$date', '$post')");
	$result1 = mysql_query("DELETE FROM comments_t WHERE text='$text'");
		if ($result == 'true') {
			echo "<p>Коментар успішно додано!</p>";
			}else{
		  	echo "<p>Коментар не додано.</p>";
		  	}
		  }else{
		  	echo "<p>Ви ввели не всю інформацію.</p>";
		  }	  




?>
          
          
          
          
        </td>
      </tr>
    </table></td>
  </tr>
<? include ("blocks/footer.php") ?>
</table>
</body>
</html>
