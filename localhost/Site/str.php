<!DOCTYPE HTML>
<html>
<head>
		<link rel="shortcut icon" href="Game.ico" type="image/x-icon">
		<meta charset="utf-8" />
		<link rel="stylesheet" href="index.css"/>
		<title>GAME SHOP INFO</title>
	</head>
<?php include "header.php";
	include "db.php";
	$id = $_POST['info']; //получаем id товара
	$login = $_COOKIE["Login"];
	$login = strtolower($login);
	
	
?>
	<div class="outer">
		<div class="inner">
		<?php $bd = mysqli_query($db, "SELECT * FROM product WHERE id='$id' ");
			
		?>
		<?php foreach($bd as $b): ?>
					<div class="str"> 
						<img src="Games\<?php echo $b["Img"]; ?>">

						<h2><?php echo $b["Name"]; ?>|</h2><h4 style=""><?php echo $b["Genre"];?></h4> <h2 style="color:green;"><?php echo $b["Price"]; ?>$</h2>
						<div><h4><?php echo $b["Description"] ?></h4></div>
						<form id="data" action="korz_add.php" method="POST">
						<?php if($b['Amount']>0){
							echo '<button id="knopi"  type="submit" name="basket" value="'.$id.'">В козину</button>';				
						}?>
							
						</form>
					</div>
				
				<?php  endforeach;?>
		</div>
	</div>
</html>