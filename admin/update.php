﻿<?
include ("blocks/bd.php");
include ("lock.php");
if (isset($_POST['droplist'])) {$cat = $_POST['droplist'];}
if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['text'])) {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['uploadfile'])) {$uploadfile = $_POST['uploadfile'];}
if (isset($_POST['url'])) {$url = $_POST['url'];}
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['old_foto'])) {$old_foto = $_POST['old_foto'];}


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

$date = date("Y-m-d");

if (basename($_FILES['uploadfile']['name']) == "")
	{
	$mini_img = "";
	}else{
	
	// Каталог, в который мы будем принимать файл:
	$uploaddir = './img/files/';
	$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
	
	// Копируем файл из каталога для временного хранения файлов:
	if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
		{}else { 
		echo "<p>Foto ERROR</p>";
		exit;
		}

	$mini_img = "admin/img/files/".$rand.$_FILES['uploadfile']['name']; // <- IMG
	}
	if ($mini_img == "") {
$mini_img = $old_foto;
	}
  
	if (isset($title) && isset($description) && isset($text) && isset($date)) {
		mysql_set_charset("utf8");
	$result = mysql_query ("UPDATE data SET title='$title', description='$description', text='$text', mini_img='$mini_img', url='$url' WHERE id='$id'");
		  
		if ($result == 'true') {
			echo "<p>Дані успішно оновлені!</p>";
			}else{
		  	echo "<p>Дані не оновлені.</p>";
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
