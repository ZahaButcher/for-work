

<?php include 'db.php'; ?>

<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="Game.ico" type="image/x-icon">
		<meta charset="utf-8" />
		<title>GAME SHOP</title>
		<link rel="stylesheet" href="index.css"/>
		<!-- Подключаем CSS слайдера -->
		<link rel="stylesheet" href="simple-adaptive-slider.css">
		<!-- Подключаем JS слайдера -->
		<script defer src="simple-adaptive-slider.js"></script>
	</head>
	
	<body>
		
		<?php require 'header.php';
		if(!empty($_COOKIE["Login"])){
			echo '<h2 style="font:italic 1.2em Fira Sans, serif; font-size:25px; margin-left:25px;">Покупай, '.$_COOKIE["Login"].'!</h2>';
		}
		
		
		?>
		
		
		
		

		
		<div >
		<!-- Разметка слайдера (html код) -->
	<div class="slide">
	<div class="slider">
	  <div class="slider__wrapper">
		<div class="slider__items">
		  <div class="slider__item" >
			<!-- Контент 1 слайда -->
			<img src="Arts/obrez/a1.jpg">
		  </div>
		  <div class="slider__item">
			<!-- Контент 2 слайда -->
			<img src="Arts/obrez/a2.jpg">
		  </div>
		  <div class="slider__item">
			<!-- Контент 3 слайда -->
		<img src="Arts/obrez/a3.jpg">
		  </div>
		  <div class="slider__item">
		   <img src="Arts/obrez/a4.jpg">
		  </div>
		<div class="slider__item">
		   <img src="Arts/obrez/a5.jpg">
		  </div>
		<div class="slider__item">
		   <img src="Arts/obrez/a6.jpg">
		  </div>
		<div class="slider__item">
		   <img src="Arts/obrez/a7.jpg">
		  </div>
		</div>
	  </div>
	</div>
	</div>
		<script>
		document.addEventListener('DOMContentLoaded', function () {
		  // инициализация слайдера
		  new SimpleAdaptiveSlider('.slider', {
			loop: true,
			autoplay: true,
			interval: 3000,
			swipe: true,
		  });
		});
		</script>
		</div>
		
		
		
		<?php include 'Product.php' ; ?>
		
		
		
	
	</body>
	<footer>
		<p>Барков З.А | Все права защищены 2022</p>
	</footer>
</html>