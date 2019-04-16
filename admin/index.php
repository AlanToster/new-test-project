<?php include ("blocks/bd.php");

// В принципі тут немає нічого нового окрім файлу lock.php. Він відповідає за те, щоб перевірити - чи адмін ти чи ні. Відкрий його

include ("lock.php");?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
<title>Панель Адміністратора</title>

<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="810" align="center" bgcolor="#FFFFFF" class="cooltable0">
<? include ("blocks/header.php") ?>
<? include ("blocks/top-menu.php") ?>
  <tr>
    <td><table width="800" class="cooltable">
      <tr>
<? include ("blocks/left.php") ?>
        <td width="584" align="left" valign="top" class="cooltable0">
          <p>Ласково прошу до Панелі Адміністратора!</p>
        </td>
      </tr>
    </table></td>
  </tr>
<? include ("blocks/footer.php") ?>
</table>
</body>
</html>