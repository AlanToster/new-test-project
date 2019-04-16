<?
include ("blocks/bd.php");
include ("lock.php");

// Отримуємо всі параметри

if (isset($_POST['cat'])) {$cat = $_POST['cat'];}
if (isset($_POST['title'])) {$title = $_POST['title']; if ($title == '') {unset($title);}}
if (isset($_POST['description'])) {$description = $_POST['description']; if ($description == '') {unset($description);}}
if (isset($_POST['text'])) {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['uploadfile'])) {$uploadfile = $_POST['uploadfile'];}
if (isset($_POST['url'])) {$url = $_POST['url'];}
if (isset($_POST['id'])) {$id = $_POST['id'];}
if (isset($_POST['old_foto'])) {$old_foto = $_POST['old_foto'];}
if (isset($_POST['author'])) {$author = $_POST['author'];}


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

// Беремо дату

$date = date("Y-m-d");

// Тут ми знаходимо фото для запису

if (basename($_FILES['uploadfile']['name']) == "")
	{
	$mini_img = "";
	}else{
	$uploaddir = './img/files/';
	$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
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
			  
	  // Спочатку ми відправляємо дані в "нормальну" базу
	  
		  $result = mysql_query ("INSERT INTO data (title,description,text,date,cat,mini_img,url,author) VALUES ('$title','$description','$text','$date','$cat','$mini_img','$url','$author')");
		  	
	// І лише тепер видаляємо їх з демо бази
	
		  $result1 = mysql_query("DELETE FROM data_in_m WHERE id='$id'");
		  		  
		  // Ну і перевідяємо чи все добре
		  
		  if ($result1 == 'true') {
			//echo "<p>Видалення виконано!</p>";
			}else{
		  	echo "<p>Щось пішло нет. Дані не були видалені з бази</p>";
		  	} 
		  
		if ($result == 'true') {
			echo "<p>Замітка була успішно додана!</p>";
			}else{
		  	echo "<p>Помилка. Замітка не була додана.</p>";
		  	}
		  }else{
		  	echo "<p>Ви ввели не всю інформацію.</p>";
		  }	  


// От і все. Тобі треба просто зрозуміти алгоритм роботи всіх цих сторінок, і тоді ти зрозумієш як працює кожна окрема сторінка.

?>
          
          
          
          
        </td>
      </tr>
    </table></td>
  </tr>
<? include ("blocks/footer.php") ?>
</table>
</body>
</html>
