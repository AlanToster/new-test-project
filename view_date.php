<? include ("blocks/bd.php");
session_start();
if (isset($_GET['date']))
{
$date = $_GET['date'];
}
else 
{
exit("<p>Ви звернулися до файлу без необхідних параметрів. Перевірте адресну строку браузера.");
}
$date_title = $date;

$date_begin = $date;
$date++;
$date_end = $date;

$date_begin = $date_begin."-01";
$date_end = $date_end."-01";




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><? echo "Новини за $date_title"; ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="800"  class="cooltable0" align="center" bgcolor="#FFFFFF">
  <? include ("blocks/header.php"); ?>
<? include ("blocks/top-menu.php") ?>
  <tr>
    <td><table width="800"  class="cooltable">
      <tr>
       <? include ("blocks/left.php"); ?>
        <td valign='top' class="cooltable0">
         <? echo "<p>Новини за $date_title</p>"; ?>
<?

        $result = mysql_query("SELECT id,title,description,date,mini_img,view,url,cat,text FROM data WHERE date>'$date_begin' AND date<'$date_end' ORDER BY id DESC",$db);

if (!$result)
{
echo "<p>Запит на вибірку даних з бази не пройшов.</p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{
if( $myrow["mini_img"] == "") {
$myrow["mini_img"] = "blocks/img/no_img.jpg";
}

if($myrow["cat"] == 1 or  $myrow["cat"] == 2) {
printf("
<table align='left' class='citaty' style='margin-left: 5px; width: 530px; margin-bottom: 10px; box-shadow: black; border: 1px solid #000000; box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.16);'>
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

if($myrow["cat"] == 3) {

printf("
<table align='left' class='citaty' style='margin-left: 5px; width: 530px; margin-bottom: 10px; box-shadow: black; border: 1px solid #000000; box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.16);'>
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
	</td>
  </tr>
</table>", $myrow["text"],$myrow["date"]);
}else{

printf("
<table align='left' class='citaty' style='margin-left: 5px; width: 530px; margin-bottom: 10px; box-shadow: black; border: 1px solid #000000; box-shadow: 10px 10px 5px -6px rgba(0, 0, 0, 0.16);'>
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
<img class="bar-desc-top" src='img/up.png'></img></span></span></a>

</body>
</html>
