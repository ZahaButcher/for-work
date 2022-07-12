<!DOCTYPE HTML>

<html class="reg">
	<head>
		<link rel="shortcut icon" href="Game.ico" type="image/x-icon">
		<meta charset="utf-8" />
		<link rel="stylesheet" href="index.css"/>
		<title>GAME SHOP PERSONAL</title>
	</head>
	<body class="reg_body">
		<?php require 'header.php' ; ?>
		<div class="outer">
			<div class="inner">
				<?php if(!empty($_COOKIE["Login"])){
			echo '<h2 style="font:italic 1.2em Fira Sans, serif; font-size:25px; margin-left:25px;">Привет, '.$_COOKIE["Login"].'!</h2>';
		}?>
				<form action="save_user.php" method="post">
					<?php if(empty($_COOKIE["Login"])){
						echo '<input id="winvvod" class="inptlog" id="up" size="15" placeholder="Login" maxlength="15" type="textdomain" name="login"><br>';
						echo '<input id="winvvod" class="inptpas" id="up" placeholder="Password" type="password" name="password">';
					}if(empty($_COOKIE["Login"])){
						
					}?>
					
					<br>
					<br>
					
					<?php if(empty($_COOKIE["Login"])){
						echo '<input id="klog" type="submit" value="Войти">';
						echo '<input id="klog" type="submit" name="submit" value="Зарегистрироваться">';
					}else{
						echo '<input style="width:100px;" id="klog" type="submit" name="submit" value="Выход">';
					}?>
					
					
				</form>
				
			</div>
			
		</div>
	</body>
	
</html>