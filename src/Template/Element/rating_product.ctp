
<?php $count = 0; ?>
<?php foreach ($item['rewiev'] as $key => $value): 
   $count = $count + $value['rating'];
 endforeach; ?>
<?php 	$total_count = 0; 
      if (count($item['rewiev']) == 0) {
      	$count_rewiev = 0;
 } else {
 	$count_rewiev  =  $count / count($item['rewiev']);
 }

if (count($item['rewiev']) == 0) { 
 for ($i = 0; $i < 5 ; $i++) : ?>

	<div class="product-star-item">
		<img src="<?= $this->Url->build('/img/gray_star.svg', ['fullBase' => true]) ?> " alt=""> 	
	</div>

<?php endfor;  
} else {
  for ($i = 0; $i < $count_rewiev ; $i++) : ?>

	<div class="product-star-item">
		<img src="<?= $this->Url->build('/img/iconfinder_star_yellow.svg', ['fullBase' => true]) ?> " alt=""> 	
	</div>

<?php endfor; ?>

<?php for ($i = 0; $i < 5 - $count_rewiev; $i++) : ?>

	<div class="product-star-item">
		<img src="<?= $this->Url->build('/img/gray_star.svg', ['fullBase' => true]) ?> " alt=""> 	
	</div>

<?php endfor; ?>
<?php 	} ?>
