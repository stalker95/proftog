
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
		<?= $this->Form->create($category, ['type' => 'file','method' => 'get', 'id'=>'product_sort'] )  ?>
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
	          	<div class="categories_product_top clearfix">
	          		<div class="categories_product_image">
	          			<?= $category->image ?>
	          		</div>
	          		<div class="categories_product_description">
	          			<div class="categories_product_title">
	          				<p><?= $category->title ?></p>
	          			</div>
	          			<div class="categories_product_description">
	          				<p><?= $category->desription ?></p>
	          			</div>
	          		</div>
	          	</div>
	          	<div class="products_sort">
	          		<div class="sort_by">
	          			Сортувати за 
	          			<select name="sort_by" id="sort_by">
	          				<? if (isset($sort_by)): ?>
	          					<option value="<?= $sort_by ?>"><?= $sort_by ?></option>
	          				<?php 	endif; ?>
	          				<option value="За рейтингом">За рейтингом</option>
	          				<option value="За спаданням ціни">За спаданням ціни </option>
	          				<option value="За зростанням ціни">За зростанням ціни </option>
	          				<option value="Акційні">Акційні</option>
	          			</select>
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
	          		<?php foreach ($products as $key => $value): ?>

	          		<a href="<?php echo $this->Url->build(['controller' => 'products','action'=>'view/'.$value['slug']]) ?>" class="propose_slider_item <?php if (!empty($value['actions_products']) OR isset($actions)): ?> propose_slider_item_show_action <?php endif; ?>">
	          			<div class="propose_slider_item_action"><p>Акція</p></div>
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/products/'.$value->image, ['fullBase' => true]) ?> " alt="">
					</div>
					<div class="propose_slider_item_stars">
						<?= $this->element('rating_product', array("item" => $value)); ?>
					</div>
					<div class="propose_slider_item_title">
						<p><?= $value['title'] ?></p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod"><?= $value['cod'] ?></span></p>
					</div>
					<div class="propose_slider_item_status">
						<?php if ($value['amoun'] > 0) { ?>
						<p class="on_sklad">На складі</p>
					<?php } ?>
					</div>
					<div class="propose_slider_item_price">
						<?= $this->element('price_product', array("item" => $value)); ?>
					</div>
				</a>

			<?php endforeach; ?>


	          	</div>
	          </div>
	           <?php
              $params = $this->Paginator->params();
              if ($params['pageCount'] > 1): ?>
                <ul class="pagination pagination-sm">
                    <?= $this->Paginator->first('<< ' . __('Перша')) ?>
                    <?= $this->Paginator->prev('< ' . __('Попередня')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Далі') . ' >') ?>
                <?= $this->Paginator->last(__('Остання') . ' >>') ?>
                </ul>
          <?php endif; ?>
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
