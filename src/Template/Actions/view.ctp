
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

<div class="breadcrums">
	<div class="breadcrums_list">
		<p class="breadcrums_title"><?= $action->title; ?></p>
		<div class="breadcrums_list_item">
			<a href="<?= $this->Url->build(['controller' => 'main','action'    =>  'index'],['fullBase' => true]) ?>">Головна</a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'actions','action'    =>  'index/'], ['fullBase' => true]) ?>">Акції</a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'actions','action'    =>  'view/'.$action->id]) ?>"><?= $action->title ?></a>
		</div>
	</div>
</div>
<section class="propose ">
	<div class="categories_page background_white container">
		<div class="row">
			<div class="col-md-3">
				<?= $this->element('catalog_categories'); ?>
				<?= $this->element('filter_block'); ?>
			</div>
			<div class="col-md-9">
	          <div class="categories_product">
	          	<div class="slider_inialize">
							<div style="background: <?= $action->background; ?>;"	>	
							<div class="center_slider_item">
								<div class="center_slider_item_left">
									<p class="center_slider_title">
										<?= $action->title ?> 
									</p>						
								</div>
								<div class="center_slider_item_right">
									<img src="<?= $this->Url->build('/actions/'.$action->image, ['fullBase' => true]) ?>" alt="">
								</div>
							</div>
						</div>
							
						
						</div>
	          	<div class="products_sort">
	          		<div class="sort_by">
	          			Сортувати за 
	          			<select name="" id="">
	          				<option value="0">За релевантністю</option>
	          			</select>
	          		</div>
	          		<div class="products_show">
	          			Показати 
	          			<select name="" id="">
	          				<option value="0">1</option>
	          			</select>
	          		</div>
	          		<div class="products_display"></div>
	          	</div>
	          	<div class="products_list">
	          		<?php foreach ($action['actions_products'] as $key => $value):?>
	          		<div class="propose_slider_item propose_slider_item_show_action ">
	          			<div class="propose_slider_item_action"><p>Акція</p></div>
					<a href="<?php echo $this->Url->build(['controller' => 'products','action'=>'view/'.$value['product']['slug']]) ?>" class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/products/'.$value['product']['image'], ['fullBase' => true]) ?> " alt="">
					</a>
					<div class="propose_slider_item_stars">
						<div class="product-star-item">
							<img src="<?= $this->Url->build('/img/iconfinder_star_yellow.svg', ['fullBase' => true]) ?> " alt=""> 	
						</div>
						<div class="product-star-item">
							<img src="<?= $this->Url->build('/img/iconfinder_star_yellow.svg', ['fullBase' => true]) ?> " alt=""> 	
						</div>
						<div class="product-star-item">
							<img src="<?= $this->Url->build('/img/iconfinder_star_yellow.svg', ['fullBase' => true]) ?> " alt=""> 	
						</div>
						<div class="product-star-item">
							<img src="<?= $this->Url->build('/img/iconfinder_star_yellow.svg', ['fullBase' => true]) ?> " alt=""> 	
						</div>
						<div class="product-star-item">
							<img src="<?= $this->Url->build('/img/gray_star.svg', ['fullBase' => true]) ?> " alt=""> 	
						</div>
					</div>
					<div class="propose_slider_item_title">
						<p><?= $value['product']['title'] ?></p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod"><?= $value['product']['cod'] ?></span></p>
					</div>
					<div class="propose_slider_item_status">
						<?php if ($value['product']['amount'] > 0) { ?>
						<p class="on_sklad">На складі</p>
					<?php } ?>
					</div>
					<div class="propose_slider_item_price">
						<?php if ($value['product']['price_new'] > 0) { ?>
							<p><span class="translate_price" data-currency="<?= $value['product']['currency_id'] ?>"><?= $value['product']['price_new'] ?></span> грн</p>
						<p class="slider_item_price_old"><span class="translate_price" data-currency="<?= $value['product']['currency_id'] ?>"><?= $value['product']['price'] ?></span> грн</p>
						<p class="slider_item_discount"> -11%</p>

					    <?php }  else { ?>
						<p><span class="translate_price" data-currency="<?= $value['product']['currency_id'] ?>"><?= $value['product']['price'] ?></span> грн</p>
					    <?php } ?>
					</div>
				</div>

			<?php endforeach; ?>


	          	</div>
	          </div>
			</div>
		</div>
	</div>
</section>
