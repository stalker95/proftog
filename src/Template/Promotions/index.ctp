
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

<div class="breadcrums">
	<div class="breadcrums_list">
		<p class="breadcrums_title">Акції</p>
		<div class="breadcrums_list_item">
			<a href="<?= $this->Url->build(['controller' => 'main','action'    =>  'index'],['fullBase' => true]) ?>">Головна</a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'actions','action'    =>  'index/'], ['fullBase' => true]) ?>">Акції</a>
			<span> / </span>
		</div>
	</div>
</div>
<section class="propose ">
	<div class="categories_page background_white container">
		<div class="row">
			<div class="col-md-3">
				<?= $this->element('catalog_categories'); ?>
			</div>
			<div class="col-md-9">
	          <div class="categories_product">
	          		<div class="actions_list">
	          		  <?php foreach ($actions as $key => $value): ?>
	          			<div class="actions_list_item">
	          				<div class="actions_list_item_top">
	          					<img src="<?= $this->Url->build('/actions/'.$value['image'], ['fullBase' => true]) ?>" alt="">
	          				</div>
	          				<div class="actions_list_item_bottom">
	          					<div class="actions_list_item_left">
	          						<p class="actions_list_item_left_title">Залишилось</p>
	          						<p class="actions_list_item_left_center"><?= $value['days_left'] ?></p>
	          						<p class="actions_list_item_left_bottom">днів</p>
	          					</div>
	          					<div class="actions_list_item_right">
	          						<div class="actions_list_item_right_start">
	          							<p><?= $value['day_begin'] ?> <?= $value['month_begin'] ?> - <?= $value['day_end'] ?> <?= $value['month_end'] ?></p>
	          						</div>
	          						<div class="actions_list_item_right_title">
	          							<p>
	          							<?php 
	          				if (strlen($value['title']) > 30){
	          				$first_string = substr($value['title'], 30);

	          				$first_empty = strpos($first_string, ' ');

	          			}
	          			if (strlen($value['title']) > 30){ ?><?= substr($value['title'], 0, 30 + $first_empty);
	          				echo "<span class='thre_comas'>...</span>"; ?>
	          			<?php 	} else { ?>
	          				<? $value['title'] ?>
	          			<?php } ?>
	          							</p>
	          						</div>
	          						<div class="actions_list_item_right_read">
	          							<a href="<?= $this->Url->build(['controller' => 'promotions','action'=>'view/'.$value['slug'], ['fullBase' => true]]) ?>">Детальніше</a>
	          						</div>
	          					</div>
	          				</div>
	          			</div>
	          		   <?php endforeach; ?>         		   
	          		</div>
	          </div>
			</div>
		</div>
	</div>
</section>
