  <tr>
    <td><table width="100%" style="border: 1px solid #000000;">
        <tr>       
          <? 
		if (empty($_SESSION['login']) or empty($_SESSION['id'])){
		echo "
		<td width='19%'><a class='coolmenu1' href='index.php'>Головна сторінка</a></td>
          <td width='10%'><a class='coolmenu1' href='about.php'>Про нас</a></td>
          <td width='63.5%'>&nbsp;</td>
		<td width='10%'><a class='coolmenu1' href='login.php'>Увійти</a></td>
		";
		}else{echo "
		<td width='19%'><a class='coolmenu1' href='index.php'>Головна сторінка</a></td>
          <td width='10%'><a class='coolmenu1' href='about.php'>Про нас</a></td>
          <td width='55%'>&nbsp;</td>
		<td width='20%'>Привіт, <strong>".$_SESSION['login']."!</strong></td>";}
		?>
      </tr>
      </table></td>
  </tr>
  