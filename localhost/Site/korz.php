<!DOCTYPE HTML>

<html class="reg">
	<head>
		<link rel="shortcut icon" href="Game.ico" type="image/x-icon">
		<meta charset="utf-8" />
		<link rel="stylesheet" href="index.css"/>
		<title>GAME SHOP BASKET</title>
	</head>
	<body class="reg_body">
		<?php include 'header.php'; include "db.php"; ?>
		<div class="outer">
			<div class="inner">
			<?php $login = $_COOKIE["Login"];
			if(!empty($login)){
				$login = strtolower($login);
				$bd = mysqli_query($db, "SELECT * FROM $login") ?>
				<?php foreach($bd as $b): ?>
					<div class="tovar"> 
						<img src="Games\<?php echo $b["Img"]; ?>">
						<h2><?php echo $b["Name"] ?> <?php echo $b["Price"] ?>$</h2>
						<form action="del.php" method="POST">
							<button id="but" type="submit" name="delet" value="<?php echo $b["id"]?>">Удалить</button>
						</form>
					</div>
				
				<?php  endforeach;?>
				<div class="under_tovar">
					<form action="buy.php" method="POST">
					<?php $prvk = mysqli_query($db,"SELECT * FROM $login");
						$num = mysqli_num_rows($prvk);
						if($num>0){
							echo '<button id="buy" name="buy" type="submit" value="buy">Купить</button>';
						}else{
							echo '<h2 style="text-align:center;">Корзина пуста</h2>';
			}
			}else{
				header("Location:reg.php");
				exit();
			}
			?>
						
					</form>
				</div>
				
				
			</div>
		</div>
		
	</body>
	
	
</html>