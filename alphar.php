<? include ("blocks/bd2.php"); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Untitled Document</title>
</head>

<body>

<?php

$result = file_get_contents("https://api.vk.com/method/wall.get?owner_id=-143658101&count=10");
$result = json_decode($result,true);
	
$hm = "0";

$coli4estvo_zapisey = "0";

$result['response'] = array_slice($result['response'], 1); 

foreach ($result['response'] as $k => $v) {?>
        <div class='wrap'>
            <p>ID <strong><?php echo $v['id'];?></strong></p>
            <p>Date: <strong><?php echo date("Y-m-d H:i:s", $v['date']);?></strong></p>
            <p>Text: <strong><?php echo $v['text'];?></strong></p>

            <?
			$coli4estvo_zapisey += 1;
			if ($v['attachment']['video']['image_big']) {
//				printf ("<p>Изображение: <img src='%s'></img></p>",$v['attachment']['video']['image_big']);
echo "Video";
			} else {
			
			if ($v['attachments'][1]['photo']['src_big']) {
				if ($v['attachments'][2]['photo']['src_big']) {
					if ($v['attachments'][3]['photo']['src_big']) {
						if ($v['attachments'][4]['photo']['src_big']) {
							if ($v['attachments'][5]['photo']['src_big']) {
								if ($v['attachments'][6]['photo']['src_big']) {
									if ($v['attachments'][7]['photo']['src_big']) {
										if ($v['attachments'][8]['photo']['src_big']) {
											if ($v['attachments'][9]['photo']['src_big']) {
												$hm = "10";
											}
											else {$hm = "9";}
										}
										else {$hm = "8";}
									}
									else {$hm = "7";}
								}
								else {$hm = "6";}
							}
							else {$hm = "5";}
						}
						else {$hm = "4";}
					}
					else {$hm = "3";}
				}
				else {$hm = "2";}
			}
			else {
				$hm = "1";
				if (!$v['attachments'][0]['photo']['src_big']) {
				$hm = "0";
				}
			}
			echo "<p>There is ".$hm." photos!</p>";
			
			if($hm == "1") {
				printf ("<p>Photo: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
				$photo1 = $v['attachments'][0]['photo']['src_big'];
			}
				if($hm == "2") {
					printf ("<p>Photo1: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
					printf ("<p>Photo2: <img src='%s'></img></p>",$v['attachments'][1]['photo']['src_big']);
					$photo1 = $v['attachments'][0]['photo']['src_big'];
					$photo2 = $v['attachments'][1]['photo']['src_big'];
				}
					if($hm == "3") {
					printf ("<p>Photo1: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
					printf ("<p>Photo2: <img src='%s'></img></p>",$v['attachments'][1]['photo']['src_big']);
					printf ("<p>Photo3: <img src='%s'></img></p>",$v['attachments'][2]['photo']['src_big']);
					$photo1 = $v['attachments'][0]['photo']['src_big'];
					$photo2 = $v['attachments'][1]['photo']['src_big'];
					$photo3 = $v['attachments'][2]['photo']['src_big'];
					}
						if($hm == "4") {
						printf ("<p>Photo1: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
						printf ("<p>Photo2: <img src='%s'></img></p>",$v['attachments'][1]['photo']['src_big']);
						printf ("<p>Photo3: <img src='%s'></img></p>",$v['attachments'][2]['photo']['src_big']);
						printf ("<p>Photo4: <img src='%s'></img></p>",$v['attachments'][3]['photo']['src_big']);
						$photo1 = $v['attachments'][0]['photo']['src_big'];
						$photo2 = $v['attachments'][1]['photo']['src_big'];
						$photo3 = $v['attachments'][2]['photo']['src_big'];
						$photo4 = $v['attachments'][3]['photo']['src_big'];
						}
							if($hm == "5") {
							printf ("<p>Photo1: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
							printf ("<p>Photo2: <img src='%s'></img></p>",$v['attachments'][1]['photo']['src_big']);
							printf ("<p>Photo3: <img src='%s'></img></p>",$v['attachments'][2]['photo']['src_big']);
							printf ("<p>Photo4: <img src='%s'></img></p>",$v['attachments'][3]['photo']['src_big']);
							printf ("<p>Photo5: <img src='%s'></img></p>",$v['attachments'][4]['photo']['src_big']);
							$photo1 = $v['attachments'][0]['photo']['src_big'];
							$photo2 = $v['attachments'][1]['photo']['src_big'];
							$photo3 = $v['attachments'][2]['photo']['src_big'];
							$photo4 = $v['attachments'][3]['photo']['src_big'];
							$photo5 = $v['attachments'][4]['photo']['src_big'];
							}
								if($hm == "6") {
								printf ("<p>Photo1: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
								printf ("<p>Photo2: <img src='%s'></img></p>",$v['attachments'][1]['photo']['src_big']);
								printf ("<p>Photo3: <img src='%s'></img></p>",$v['attachments'][2]['photo']['src_big']);
								printf ("<p>Photo4: <img src='%s'></img></p>",$v['attachments'][3]['photo']['src_big']);
								printf ("<p>Photo5: <img src='%s'></img></p>",$v['attachments'][4]['photo']['src_big']);
								printf ("<p>Photo6: <img src='%s'></img></p>",$v['attachments'][5]['photo']['src_big']);
								$photo1 = $v['attachments'][0]['photo']['src_big'];
								$photo2 = $v['attachments'][1]['photo']['src_big'];
								$photo3 = $v['attachments'][2]['photo']['src_big'];
								$photo4 = $v['attachments'][3]['photo']['src_big'];
								$photo5 = $v['attachments'][4]['photo']['src_big'];
								$photo6 = $v['attachments'][5]['photo']['src_big'];
								}
									if($hm == "7") {
									printf ("<p>Photo1: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
									printf ("<p>Photo2: <img src='%s'></img></p>",$v['attachments'][1]['photo']['src_big']);
									printf ("<p>Photo3: <img src='%s'></img></p>",$v['attachments'][2]['photo']['src_big']);
									printf ("<p>Photo4: <img src='%s'></img></p>",$v['attachments'][3]['photo']['src_big']);
									printf ("<p>Photo5: <img src='%s'></img></p>",$v['attachments'][4]['photo']['src_big']);
									printf ("<p>Photo6: <img src='%s'></img></p>",$v['attachments'][5]['photo']['src_big']);
									printf ("<p>Photo7: <img src='%s'></img></p>",$v['attachments'][6]['photo']['src_big']);
									$photo1 = $v['attachments'][0]['photo']['src_big'];
									$photo2 = $v['attachments'][1]['photo']['src_big'];
									$photo3 = $v['attachments'][2]['photo']['src_big'];
									$photo4 = $v['attachments'][3]['photo']['src_big'];
									$photo5 = $v['attachments'][4]['photo']['src_big'];
									$photo6 = $v['attachments'][5]['photo']['src_big'];
									$photo7 = $v['attachments'][6]['photo']['src_big'];
									}
										if($hm == "8") {
										printf ("<p>Photo1: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
										printf ("<p>Photo2: <img src='%s'></img></p>",$v['attachments'][1]['photo']['src_big']);
										printf ("<p>Photo3: <img src='%s'></img></p>",$v['attachments'][2]['photo']['src_big']);
										printf ("<p>Photo4: <img src='%s'></img></p>",$v['attachments'][3]['photo']['src_big']);
										printf ("<p>Photo5: <img src='%s'></img></p>",$v['attachments'][4]['photo']['src_big']);
										printf ("<p>Photo6: <img src='%s'></img></p>",$v['attachments'][5]['photo']['src_big']);
										printf ("<p>Photo7: <img src='%s'></img></p>",$v['attachments'][6]['photo']['src_big']);
										printf ("<p>Photo8: <img src='%s'></img></p>",$v['attachments'][7]['photo']['src_big']);
										$photo1 = $v['attachments'][0]['photo']['src_big'];
										$photo2 = $v['attachments'][1]['photo']['src_big'];
										$photo3 = $v['attachments'][2]['photo']['src_big'];
										$photo4 = $v['attachments'][3]['photo']['src_big'];
										$photo5 = $v['attachments'][4]['photo']['src_big'];
										$photo6 = $v['attachments'][5]['photo']['src_big'];
										$photo7 = $v['attachments'][6]['photo']['src_big'];
										$photo8 = $v['attachments'][7]['photo']['src_big'];
										}
											if($hm == "9") {
											printf ("<p>Photo1: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
											printf ("<p>Photo2: <img src='%s'></img></p>",$v['attachments'][1]['photo']['src_big']);
											printf ("<p>Photo3: <img src='%s'></img></p>",$v['attachments'][2]['photo']['src_big']);
											printf ("<p>Photo4: <img src='%s'></img></p>",$v['attachments'][3]['photo']['src_big']);
											printf ("<p>Photo5: <img src='%s'></img></p>",$v['attachments'][4]['photo']['src_big']);
											printf ("<p>Photo6: <img src='%s'></img></p>",$v['attachments'][5]['photo']['src_big']);
											printf ("<p>Photo7: <img src='%s'></img></p>",$v['attachments'][6]['photo']['src_big']);
											printf ("<p>Photo8: <img src='%s'></img></p>",$v['attachments'][7]['photo']['src_big']);
											printf ("<p>Photo9: <img src='%s'></img></p>",$v['attachments'][8]['photo']['src_big']);
											$photo1 = $v['attachments'][0]['photo']['src_big'];
											$photo2 = $v['attachments'][1]['photo']['src_big'];
											$photo3 = $v['attachments'][2]['photo']['src_big'];
											$photo4 = $v['attachments'][3]['photo']['src_big'];
											$photo5 = $v['attachments'][4]['photo']['src_big'];
											$photo6 = $v['attachments'][5]['photo']['src_big'];
											$photo7 = $v['attachments'][6]['photo']['src_big'];
											$photo8 = $v['attachments'][7]['photo']['src_big'];
											$photo9 = $v['attachments'][8]['photo']['src_big'];
											}
												if($hm == "10") {
												printf ("<p>Photo1: <img src='%s'></img></p>",$v['attachments'][0]['photo']['src_big']);
												printf ("<p>Photo2: <img src='%s'></img></p>",$v['attachments'][1]['photo']['src_big']);
												printf ("<p>Photo3: <img src='%s'></img></p>",$v['attachments'][2]['photo']['src_big']);
												printf ("<p>Photo4: <img src='%s'></img></p>",$v['attachments'][3]['photo']['src_big']);
												printf ("<p>Photo5: <img src='%s'></img></p>",$v['attachments'][4]['photo']['src_big']);
												printf ("<p>Photo6: <img src='%s'></img></p>",$v['attachments'][5]['photo']['src_big']);
												printf ("<p>Photo7: <img src='%s'></img></p>",$v['attachments'][6]['photo']['src_big']);
												printf ("<p>Photo8: <img src='%s'></img></p>",$v['attachments'][7]['photo']['src_big']);
												printf ("<p>Photo9: <img src='%s'></img></p>",$v['attachments'][8]['photo']['src_big']);
												printf ("<p>Photo9: <img src='%s'></img></p>",$v['attachments'][9]['photo']['src_big']);
												$photo1 = $v['attachments'][0]['photo']['src_big'];
												$photo2 = $v['attachments'][1]['photo']['src_big'];
												$photo3 = $v['attachments'][2]['photo']['src_big'];
												$photo4 = $v['attachments'][3]['photo']['src_big'];
												$photo5 = $v['attachments'][4]['photo']['src_big'];
												$photo6 = $v['attachments'][5]['photo']['src_big'];
												$photo7 = $v['attachments'][6]['photo']['src_big'];
												$photo8 = $v['attachments'][7]['photo']['src_big'];
												$photo9 = $v['attachments'][8]['photo']['src_big'];
												$photo10 = $v['attachments'][9]['photo']['src_big'];
												}
}
			?>
            

            <!-- <p>Info: <strong><?php //echo $v['attachment']['link']['description'];?></strong></p> -->
            <!-- <p>Comments: <strong><?php //echo $v['comments']['count'];?></strong></p> -->

            <p>Likes: <strong><?php echo $v['likes']['count'];?></strong></p>
            <p>Reposts: <strong><?php echo $v['reposts']['count'];?></strong></p>
        </div>
        <hr>
        
        
        
        
        
       <? 
	   
	   // Zapis v bazu
	   
	   $idz = $v['id'];
	   $datez = date("Y-m-d", $v['date']);
	   $textz = $v['text'];
	   // photo1-10 tam
	   $likesz = $v['likes']['count'];
	   $repostsz = $v['reposts']['count'];

	   
	   
	   //$to_db = mysql_query ("INSERT INTO data_in_m (title,description,text,date,cat,mini_img,url,author) VALUES ('$title','$description','$text','$date','$cat','$mini_img','$url','$author')"); ?>
        
        
        
   <?php }?>

<p>Vivedeno <strong><? echo $coli4estvo_zapisey ?></strong> zapisey.</p>

</body>
</html>