
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
	          			<!--Сортувати за 
	          			<select name="sort_by" id="sort_by">
	          				<? if (isset($sort_by)): ?>
	          					<option value="<?= $sort_by ?>"><?= $sort_by ?></option>
	          				<?php 	endif; ?>
	          				<option value="За рейтингом">За рейтингом</option>
	          				<option value="За спаданням ціни">За спаданням ціни </option>
	          				<option value="За зростанням ціни">За зростанням ціни </option>
	          				<option value="Акційні">Акційні</option>
	          			</select> -->
	          			<div class="center">
	          				<p class="sorter_title">Сортувати</p>
  								<select name="sort_by" id="sort_by" class="custom-select custom-select-two sources"
  								 <? if (isset($sort_by)){ ?> placeholder="<?= $sort_by ?>"  
  								 <?php 	} else { ?>
  								 	placeholder="За рейтингом"
  								 <?php } ?>>
    								<option value="За рейтингом">За рейтингом</option>
	          				<option value="За спаданням ціни">За спаданням ціни</option>
	          				<option value="За зростанням ціни">За зростанням ціни</option>
	          				<option value="Акційні">Акційні</option>
 								 </select>
						</div>
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
						<?= $this->element('price_product', array("item" => $value['product'])); ?>
					</div>
					<div class="product_buttons">
						<button class="product_buttons_item add_product_to_bascket" data-product="<?= $value['product']['id'] ?>">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<a href="<?= $this->Url->build(['controller' => 'products','action'=>'view/'.$value['product']['slug']]) ?>" class="product_buttons_item" >
							<i class="fa fa-eye"></i>
						</a>
						<button class="product_buttons_item add_product_to_wishlist" data-product="<?= $value['product']['id'] ?>">
							<img src="<?= $this->Url->build('/img/favorite.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<i class="fa fa-exchange"></i>
						</button>
					</div>
				</div>

			<?php endforeach; ?>


	          	</div>
	          </div>
			</div>
		</div>
	</div>
</section>
