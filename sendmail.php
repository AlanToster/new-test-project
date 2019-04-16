<?php 
if (isset($_POST['namex'])){$name = $_POST['namex'];}
if (isset($_POST['e-mailx'])){$email = $_POST['e-mailx'];}
if (isset($_POST['themx'])){$them = $_POST['themx'];}
if (isset($_POST['textx'])){$text = $_POST['textx'];}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Зворотній звязок</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="800"  class="cooltable0" align="center" bgcolor="#FFFFFF">

  <? include("blocks/header.php"); ?>
<? include ("blocks/top-menu.php") ?>
  <tr>
    <td><table width="800"  class="cooltable">
      <tr>
  
  <? //include("blocks/left.php"); ?>
  

<td width="584" align="left" valign="top" class="cooltable0"><p>Зворотній звязок
<p>
<?php 
if($them != "" && $name != "" && $email !="" && $text != ""){
$send = mail("zhenechka_pupkin_2018@mail.ru", $them, "Ім*я: ".$name."  \nПошта: ".$email."  \nПовідомлення: ".$text);
if ($send)
{
echo "Повідомлення було успішно надіслане";
} else {
echo "Повідомлення не було надіслане";
}
}else {
echo "Заповність всі поля для надіслання листа.";
}

?>
</p>
<p>&nbsp;</p>

        
        </td>
        
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
