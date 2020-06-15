
	<?php 	 $data = date("Y-m-d H:i:s"); ?>
	<?php 	

	$price_product = $item['price'];
	$old_price = $item['price'];
	$products_discount = $item['price'];
	$discount = false;
	//echo "1";

	if (isset($item->producer->producers_discounts[0]['discount'])) {
		$price_discount = $item->producer->producers_discounts[0]['discount'];
	}
  
	foreach ($item['discounts'] as $key => $values): 
		$date_compare1= date("Y-m-d H:i:s", strtotime($data));
				// date now
		$date_compare2= date("Y-m-d H:i:s", strtotime($values['end_data']->i18nFormat('YYY-MM-dd')));
		$start_data = date("Y-m-d H:i:s", strtotime($values['start_data']->i18nFormat('YYY-MM-dd')));

		if ($date_compare1 < $date_compare2 AND $date_compare1 > $start_data) {
			$products_discount = $values['price'];
			$discount = true;
			break;
		}

	 	endforeach; 

	 	if (isset($item->producer->producers_discounts[0]['discount'])) {
	 		$persent = $item->producer->producers_discounts[0]['discount'];
	 		$price_product =  $price_product - ($price_product * ($persent / 100)) ;
	 }
?>
	 	<?php if ($discount == true ) { ?>
	<p>
		<span class="translate_price" data-currency="<?= $item['currency_id'] ?>">
			<?= $products_discount ?>
		</span>   грн 
	</p>

	<p class="slider_item_price_old">
		<span class="translate_price" data-currency="<?= $item['currency_id'] ?>">
			<?=  $price_product ?>
		</span> грн
	</p>

	<p class="slider_item_discount">-
		<?php 
		
		$persent = $price_product / 100; 
		$difference = ($price_product - ($products_discount)) / $persent;  
		echo round($difference).'%</p>';;	
			?>
	<?php 	 } else { ?>
	<p>
		<span class="translate_price" data-currency="<?= $item['currency_id'] ?>">
			<?= $price_product ?>
		</span> грн
	</p>
<?php } ?>

