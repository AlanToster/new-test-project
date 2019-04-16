<?php include ("blocks/bd.php");
include ("lock.php");

if (isset($_GET['id'])) {$id = $_GET['id']; if ($id == '') {unset($id);}}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
<title>Сторінка для додавання нового уроку</title>

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
mysql_set_charset("utf8");
$result = mysql_query("SELECT * FROM comments_t ORDER BY id DESC");
$myrow = mysql_fetch_array($result);

?>

<form action=update_c.php method=post enctype=multipart/form-data>


<p class="style1">
              <label>Автор: <br>
              <input name="author" id="author" value="<? echo $myrow['author']; ?>">
              </label>
            </p>
<p class="style1">
              <label>Текст: <br>
              <textarea name="text" id="text" cols="45" rows="5"><? echo $myrow['text']; ?></textarea>
              </label>
            </p>
<p class="style1">
              <label>Дата: <br>
              <input name="date" id="date" value="<? echo $myrow['date']; ?>">
              </label>
            </p>
            <p>
              <input type="hidden" name="post" id="post" value="<? echo $myrow['post']; ?>">
            </p>
<p>
              <label>
                <input type="submit" name="submit" id="submit" value="Додати">
                </label>
            </p>
          </form>
<form action=del_comment.php method=post enctype=multipart/form-data>
<p>
              <input type="hidden" name="id" id="id" value="<? echo $id ?>">
            </p>
<label>
                <p><input type="submit" name="submit" id="submit" value="Видалити"></p>
                </label>
</form>




<?

?>
          
        </td>
      </tr>
    </table></td>
  </tr>
<? include ("blocks/footer.php") ?>
</table>
</body>
</html>
