<?php 
include ("blocks/bd.php");
session_start();
if (isset($_GET['id'])) {$id = $_GET['id'];}

$result = mysql_query("SELECT * FROM data WHERE id='$id'",$db);
$myrow = mysql_fetch_array($result);

$new_view = $myrow["view"] + 1;
$update = mysql_query ("UPDATE data SET view='$new_view' WHERE id='$id'",$db);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>

<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><?php echo $myrow['title'] ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="800"  class="cooltable0" align="center" bgcolor="#FFFFFF">

  <? include("blocks/header.php"); ?>
<? include ("blocks/top-menu.php") ?>
  <tr>
    <td><table width="800" class="cooltable">
      <tr>
  
  <? include("blocks/left.php"); ?>
  

<td width="584" valign="top" class="maintext" class="cooltable0">
<p class="view_title"><?php echo $myrow['title'] ?></p>




<p style="    font-size: 11px;
    color: #cccccc;
    text-align: right;">Дата: <?php echo $myrow['date'] ?></p>
	<p><center><img align="center" style="height: 370px;" src='<?php echo $myrow['mini_img'] ?>'></img></center></p>
	
<p id="b1" onclick="answer.style.visibility='visible';" style="
    text-decoration: underline;
">Відповідь: <span id="answer" style="visibility: hidden;"><strong><?php echo $myrow['text'] ?></strong></span></p>

<?
if ($myrow["author"] != "") {
echo "<p closs='views'>Автор: ".$myrow['author']."</p>";}?>
<p class="views">
Переглядів: <? echo $myrow["view"] ?>
</p>
<p class="dates">Дата: <?php echo $myrow['date'] ?></p>





<?
echo "<p class='post_comment'>Коментарії до цієї замітки:</p>";	

$result3 = mysql_query ("SELECT * FROM comments WHERE post='$id'",$db);
if (mysql_num_rows($result3) > 0)
{
$myrow3 = mysql_fetch_array($result3);

do 
{
printf ("<div class='post_div'><p class='post_comment_add'>Коментарій добавив(ла): <strong>%s</strong> <br> Дата: <strong>%s</strong></p>
<p>%s</p></div>",$myrow3["author"], $myrow3["date"], $myrow3["text"]);

}
while ($myrow3 = mysql_fetch_array($result3));


}

$result4 = mysql_query ("SELECT img FROM comments_setting",$db);
$myrow4 = mysql_fetch_array($result4);

?>

<p class='post_comment'>Додати свій коментар:</p>
<form action="comment_2.php" method="post" name="form_com">
<p><label>Ваше ім'я: </label><input name="author" type="text" size="30" maxlength="30" value="<? echo $_SESSION['login'] ?>"></p>
<p><label>Текст: <br> <textarea name="text" cols="32" rows="4"></textarea></label></p><p>Введіть число з картинки:<br><img style='margin-top:17px;' src="<? echo $myrow4["img"]; ?>" width="80" height="40">
  <input style='margin-bottom:16px;' name="pr" type="text" size="5" maxlength="5"></p>
  <input name="id" type="hidden" value="<? echo $id; ?>">
  <input name="url" type="hidden" value="nope">
<p><input name="sub_com" type="submit" value="Коментувати"></p> 


</form>






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