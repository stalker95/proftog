
	<?php 	 $data = date("Y-m-d H:i:s"); ?>
	<?php 	
	$final_price = 0;
	$final_price_main = 0;
	$fina_discount = 0;
	$persents = 0;
	$price_product = 0;

	$price_product = $item['price'];
	//echo "1";

	if (isset($item->producer->producers_discounts[0]['discount'])) {
		$persents = $item->producer->producers_discounts[0]['discount'];
	}
  
	foreach ($item['discounts'] as $key => $values): 
		$date_compare1= date("Y-m-d H:i:s", strtotime($data));
				// date now
		$date_compare2= date("Y-m-d H:i:s", strtotime($values['end_data']->i18nFormat('YYY-MM-dd')));
		$start_data = date("Y-m-d H:i:s", strtotime($values['start_data']->i18nFormat('YYY-MM-dd')));
		if ($date_compare1 < $date_compare2 AND $date_compare1 > $start_data) {

			$final_price = $item['price'];
			$fina_discount = $values['price'];
			$price_product = $final_price - $values['price'];
			break;
		}
	 	endforeach; 
	 	if (isset($item->producer->producers_discounts[0]['discount'])) {
	 		$final_price = $final_price - ($final_price * ($persents / 100)) ;
	 		$price_product =  $price_product - ($price_product * ($persents / 100)) ;
	 }
?>
	 	<?php if ($final_price != 0 ) {?>
	<p>
		<span class="translate_price" data-currency="<?= $item['currency_id'] ?>">
			<?= $final_price - $fina_discount ?>
		</span>   грн 
	</p>

	<p class="slider_item_price_old">
		<span class="translate_price" data-currency="<?= $item['currency_id'] ?>">
			<?php if ($persents != 0) {
					echo  $item['price'] - ($item['price'] * ($persents / 100)) ; 
				} else {
					echo  $item['price'];
				} ?>
		</span> грн
	</p>

	<p class="slider_item_discount">-
		<?php 
		if ($persents != 0) {
		$persent = $price_product / 100; 
		$difference = ($price_product - ($final_price - $fina_discount)) / $persent;  
		echo round($difference).'%</p>'; } else {
		$persent = $item['price'] / 100; $difference = ($item['price'] - ($final_price - $fina_discount)) / $persent;  echo round($difference).'%</p>';	
			?>
	<?php 	} } else { ?>
	<p>
		<span class="translate_price" data-currency="<?= $item['currency_id'] ?>">
			<?php 
    			if ($persents != 0) {
					echo  $item['price'] - ($item['price'] * ($persents / 100)) ; 
				} else {
					echo  $item['price'];
				}
	?>
		</span> грн
	</p>
<?php } ?>

