
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

<div class="breadcrums">
	<div class="breadcrums_list">
		<p class="breadcrums_title"><?= $producer->title; ?></p>
		<div class="breadcrums_list_item">
			<a href="<?= $this->Url->build(['controller' => 'main','action'    =>  'index'],['fullBase' => true]) ?>">Головна</a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'actions','action'    =>  'view/'.$producer->id]) ?>"><?= $producer->title ?></a>
		</div>
	</div>
</div>
<section class="propose ">
	<div class="categories_page background_white container">
		<?= $this->Form->create($producer, ['type' => 'file','method' => 'get', 'id'=>'product_sort'] )  ?>
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
                            <a href="<?= $this->Url->build(['controller' => 'categories','action'=>$value['slug']]) ?>"><?= $value['name'] ?></a>
                        </div>
                        <div class="propose_item_arrov">
                            <i class="fa fa-chevron-right"></i>
                        </div>
                        <div class="propose_item_list">
                            <?php  foreach ($value['child_categories'] as $key => $item):?>
                                <div class="propose_item_list_item">
                                    <a href="<?= $this->Url->build(['controller' => 'categories','action'=>$item['slug']]) ?>"><?= $item['name']; ?></a>
                                
                           
                                <?php foreach ($categories as $key => $item_two): ?>
                                    <div class="propose_item_list_two">
                                <?php if ($item_two['parent_id'] == $item['id'] AND $item_two['name'] != $item['name']) {
                                 echo "<a  href=".$this->Url->build(['controller' => 'categories','action'=>$item['slug']]).">".$item_two['name']."</a>"; } ?>
                                  </div>
                            <?php endforeach; ?>
                           </div>
                            <?php   endforeach; ?>
                          
                           
                           
                        </div>
                     </div>
                 <?php endif; ?>
                    <?php endforeach; ?>

                    </div>
                    <?= $this->element('filter_block', 
						   array('max_price'         => $max_price, 
				      			 'min_price'         => $min_price, 
				                 'attributes_to_view'=> [],
				                 'current_value_min' => $current_value_min,
				                 'current_value_max' => $current_value_max,
				                 'selected_values'   => [],
				                 'producers_list'    => $producers_list,
				                 'producers_page'    => false
				  ));

				?>
			</div>
			<div class="col-md-9">
	          <div class="categories_product">
	          	<div class="categories_product_top">
	          		<div class="categories_product_image" style="background: none;">
	          			<img src="<?= $this->Url->build('/producers/'.$producer->image, ['fullBase' => true]) ?> " style="max-width: 100%;" alt="">
	          		</div>
	          		<div class="categories_product_description">
	          			<div class="categories_product_title">
	          				<p><?= $producer->title ?></p>
	          			</div>
	          			<div class="categories_product_description">
	          				<p></p>
	          				<?php if (strlen($producer->description) > 545){ ?>
	          				<span class="short_category_description"><?= substr($producer->description, 0, 545);
	          				echo "<span class='thre_comas'>...</span>"; ?></span>
	          				<span class="all_description all_description_dispayed"><?= substr($producer->description, 545) ?></span>
	          				<div class="display_all">Розгорнути <i class="fa fa-caret-down"></i></div>
	          			<?php } else { ?>
	          				<?= $producer->description ?>
	          			<?php } ?>
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
	          			<select name="count_display" id="count_display">
	          				<?php if (isset($count_display)): ?>
	          					<option value="<?= $count_display ?>"><?= $count_display ?></option>
	          				<?php endif; ?>
	          				<option value="9">9</option>
	          				<option value="12">12</option>
	          				<option value="16">16</option>
	          			</select>
	          		</div>
	          		<div class="products_display"></div>
	          	</div>
	          	<div class="products_list">
	          		<?php foreach ($products as $key => $value):?>
	          		<div class="propose_slider_item <?php if (!empty($value['actions'])): ?> propose_slider_item_show_action <?php endif; ?> ">
	          			<div class="propose_slider_item_action"><p>Акція</p></div>
					<a href="<?php echo $this->Url->build(['controller' => 'products','action' => $value['slug']]) ?>" class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/products/'.$value['image'], ['fullBase' => true]) ?> " alt="">
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
						<p><a href="<?php echo $this->Url->build(['controller' => 'products','action'=>$value['slug']]) ?>"><?= $value['title'] ?></a></p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod"><?= $value['cod'] ?></span></p>
					</div>
					<div class="propose_slider_item_status">
						<?php if ($value['amount'] > 0) { ?>
						<p class="on_sklad">На складі</p>
					<?php } ?>
					</div>
					<div class="propose_slider_item_price">
						<?= $this->element('price_product', array("item" => $value)); ?>
					</div>
					<div class="product_buttons">
						<button type="button" class="product_buttons_item add_product_to_bascket" data-product="<?= $value['id'] ?>">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<a href="<?= $this->Url->build(['controller' => 'products','action'=>$value['slug']]) ?>" class="product_buttons_item" >
							<i class="fa fa-eye"></i>
						</a>
						<button type="button" class="product_buttons_item add_product_to_wishlist" data-product="<?= $value['id'] ?>">
							<img src="<?= $this->Url->build('/img/favorite.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button type="button" class="product_buttons_item add_product_to_compare" data-product="<?= $value['id'] ?>">
							<i class="fa fa-exchange"></i>
						</button>
					</div>
				</div>

			<?php endforeach; ?>


	          	</div>
	          	 <?php
              $params = $this->Paginator->params();
              if ($params['pageCount'] > 1): ?>
                <ul class="pagination pagination-sm">
                    <?= $this->Paginator->first('<< ') ?>
                    <?= $this->Paginator->prev('< ' ) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(' >') ?>
                <?= $this->Paginator->last(' >>') ?>
                </ul>
          <?php endif; ?>
	          </div>
			</div>
		</div>
				     <?=   $this->Form->end() ?>

	</div>
</section>

<script>
    <?php echo $this->Html->scriptStart(['block' => true]); ?>

    		$("#sort_by").change(function() {
               $("#product_sort").submit();
    		});

    		$("#count_display").change(function() {
               $("#product_sort").submit();
    		});

    <?php echo $this->Html->scriptEnd(); ?>
</script>
