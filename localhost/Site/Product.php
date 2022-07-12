
<div class="product"> 
	<div class="grid">
	
	<?php $inf = get_inf();
	foreach($inf as $sing):?>
		
		<div id="Scale" class="grid_item"> <img src="Games\<?php echo $sing["Img"]; ?>">
			<ul class="hr">
			<li><form id="data" action="str.php" method="POST">
				<button id="knop" type="submit" name="info" value="<?php echo $sing["id"]; ?>">Информация</button>
			</form></li>
			<li><form id="data" action="korz_add.php" method="POST">
				<?php if($sing["Amount"]>0){
					echo '<button id="knop"  type="submit" name="basket" value="'.$sing["id"].'">В козину</button>';
				}else{
					echo '<button id="knopn"  type="submit" name="basket" >Нет в наличии</button>';
				}?>
				
			</form></li>
			
			</ul>
		</div>
	<?php  endforeach;?>	
	</div>
</div>