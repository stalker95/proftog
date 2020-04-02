
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

<div class="breadcrums">
	<div class="breadcrums_list">
		<p class="breadcrums_title"><?= $category->title; ?></p>
		<div class="breadcrums_list_item">
			<a href="<?= $this->Url->build(['controller' => 'main','action'    =>  'index'],['fullBase' => true]) ?>">Головна</a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'categories','action'    =>  'index/'], ['fullBase' => true]) ?>">Категорії</a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'categories','action'    =>  'view/'.$category->slug]) ?>"><?= $category->title ?></a>
		</div>
	</div>
</div>
<section class="propose ">
	<div class="categories_page background_white container">
		<?= $this->Form->create($category, ['type' => 'file'] )  ?>
		<div class="row">
			<div class="col-md-3">
				<?= $this->element('catalog_categories'); ?>
				<?= $this->element('filter_block', 
						   array('max_price'         => $max_price, 
				      			 'min_price'         => $min_price, 
				                 'attributes_to_view'=> $attributes_to_view,
				                 'current_value_min' => $current_value_min,
				                 'current_value_max' => $current_value_max,
				                 'selected_values'   => $selected_values,
				                 'producers_list'    => $producers_list
				  ));

				       ?>
			</div>
			<div class="col-md-9">
	          <div class="categories_product">
	          	<div class="categories_product_top">
	          		<div class="categories_product_image">
	          			<?= $category->image ?>
	          		</div>
	          		<div class="categories_product_description">
	          			<div class="categories_product_title">
	          				<p><?= $category->title ?></p>
	          			</div>
	          			<div class="categories_product_description">
	          				<p><?= $category->description ?></p>
	          			</div>
	          		</div>
	          	</div>
	          	<div class="products_sort">
	          		<div class="sort_by">
	          			Сортувати за 
	          			<select name="" id="">
	          				<option value="0">1</option>
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
	          		<?php foreach ($products as $key => $value):?>
	          		<a href="<?php echo $this->Url->build(['controller' => 'products','action'=>'view/'.$value['slug']]) ?>" class="propose_slider_item">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/products/'.$value->image, ['fullBase' => true]) ?> " alt="">
					</div>
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
						<p><?= $value['title'] ?></p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod">25456</span></p>
					</div>
					<div class="propose_slider_item_status">
						<?php if ($value['amoun'] > 0) { ?>
						<p class="on_sklad">На складі</p>
					<?php } ?>
					</div>
					<div class="propose_slider_item_price">
						<p><span class="translate_price"><?= $value['price'] ?></span> грн</p>
					</div>
				</a>

			<?php endforeach; ?>


	          	</div>
	          </div>
			</div>
		</div>
		     <?=   $this->Form->end() ?>
	</div>
</section>
