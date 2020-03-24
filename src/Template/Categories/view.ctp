
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
		<div class="row">
			<div class="col-md-3">

                <div class="propose_left">
                    <div class="propose_left_top">
                        <div class="propose_left_gamburger">
                            <div class="menu-opener-inner active"></div>
                        </div>
                        <div class="propose_left_title">
                            <p><i class="fa fa-bars"></i> Каталог товарів</p>
                        </div>
                    </div>

                </div>                    
                    <div class="propose_list">
                    <?php foreach ($categories as $key => $value): ?>
                    <?php   if ($value['parent_id'] == 0): ?>
                     <div class="propose_item">
                        <div class="propose_item_title">
                            <a href="<?= $this->Url->build(['controller' => 'categories','action'=>'view/'.$value['slug']]) ?>"><?= $value['name'] ?></a>
                        </div>
                        <div class="propose_item_arrov">
                            <i class="fa fa-chevron-right"></i>
                        </div>
                        <div class="propose_item_list">
                            <?php  foreach ($value['child_categories'] as $key => $item):?>
                                <div class="propose_item_list_item">
                                    <a href="<?= $this->Url->build(['controller' => 'categories','action'=>'view/'.$item['slug']]) ?>"><?= $item['name']; ?></a>
                                
                           
                                <?php foreach ($categories as $key => $item_two): ?>
                                    <div class="propose_item_list_two">
                                <?php if ($item_two['parent_id'] == $item['id'] AND $item_two['name'] != $item['name']) {
                                 echo "<a  href=".$this->Url->build(['controller' => 'categories','action'=>'view/'.$item['slug']]).">".$item_two['name']."</a>"; } ?>
                                  </div>
                            <?php endforeach; ?>
                           </div>
                            <?php   endforeach; ?>
                          
                           
                           
                        </div>
                     </div>
                 <?php endif; ?>
                    <?php endforeach; ?>

                    </div>
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
	</div>
</section>
