
<style>
	header .propose_list {
		display: block;
	}
	@media (max-width: 768px) {
		header .propose_list {
			display: none;
		}
	}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<section class="propose">
	<div class="propose_inside container">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-9">
				<div class="">
					<div class="advantages">
						<div class="advantages_item">
							<div class="advantages_item_left">
								<img src="<?= $this->Url->build('/img/delivery.svg', ['fullBase' => true]) ?>" alt="">
							</div>
							<div class="advantages_item_right">
								<p>Доставка обладнання в найкортші терміни</p>
							</div>
						</div>
						<div class="advantages_item">
							<div class="advantages_item_left">
								<img src="<?= $this->Url->build('/img/manager.svg', ['fullBase' => true]) ?>" alt="">
							</div>
							<div class="advantages_item_right">
								<p>Професійне консультування</p>
							</div>
						</div>
						<div class="advantages_item">
							<div class="advantages_item_left">
								<img src="<?= $this->Url->build('/img/garanted.svg', ['fullBase' => true]) ?>" alt="">
							</div>
							<div class="advantages_item_right">
								<p>Гарантія на весь товар</p>
							</div>
						</div>
					</div>
					<div class="center_slider">
						<div class="slider_arrow_left">
							<img src="<?= $this->Url->build('/img/arrov_left.svg', ['fullBase' => true]) ?>" alt="">
						</div>
						<div class="slider_arrow_right">
							<img src="<?= $this->Url->build('/img/arrov_right.svg', ['fullBase' => true]) ?>" alt="">
						</div>
						<div class="slider_inialize">
							<?php foreach ($actions as $key => $value): ?>
							<div style="background: <?= $value['background']; ?>;"	data-backgroud="<?= $value['background']; ?>">	
							<div class="center_slider_item" style="background: <?= $value['background']; ?>;">
								<div class="center_slider_item_left">
									<p class="center_slider_title">
										<?= $value['title'] ?> 
									</p>

									<a href="<?= $this->Url->build(['controller' => 'actions','action'=>$value['slug']]) ?>" class="center_slider_link">Детальніше</a>
								</div>
								<div class="center_slider_item_right">
									<img class="lazy_load" data-load="<?= $this->Url->build('/actions/'.$value['image'], ['fullBase' => true]) ?>" src="" alt="">
								</div>
							</div>
						</div>
					<?php endforeach; ?>
							
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="products">
	<div>
	<div class="container">
		<div class="slider_arrow_left">
							<img src="<?= $this->Url->build('/img/arrov_left.svg', ['fullBase' => true]) ?>" alt="">
						</div>
						<div class="slider_arrow_right">
							<img src="<?= $this->Url->build('/img/arrov_right.svg', ['fullBase' => true]) ?>" alt="">
						</div>
			<div class="products_slider">
				<?php foreach ($categories as $key => $value): if ($value['parent_id'] == 0) :?>
				<div>
					<a href="<?= $this->Url->build(['controller' => 'categories','action'=>$value['slug']]) ?>" class="products_slider_item">
						<?= $value['image'] ?>
					</a>
				</div>
			<?php endif; endforeach; ?>
			</div>
	</div>
</div>
</section>
<?php if (!empty($proposes)): ?>
<div class="propose">
			<div class=" propose_top container">
		<p class="propose_title">Пропозиція дня</p>
		<div class="propose_arrows">
			<div class="slider_arrow_left">
				<img src="<?= $this->Url->build('/img/arrov_left.svg', ['fullBase' => true]) ?>" alt="">
			</div>
			<div class="slider_arrow_right">
				<img src="<?= $this->Url->build('/img/arrov_right.svg', ['fullBase' => true]) ?>" alt="">
			</div>
		</div>	
</div>
	<div class="propose_container container">
		<div class="propose_slider">
			<?php foreach ($proposes as $key => $value): ?>
				<div class="propose_slider_item <?= $this->element('action_product', array("item" => $value['product']['actions_products'])); ?> ">
					<div class="propose_slider_item_action"><p>Акція</p></div>
					<a href="<?= $this->Url->build(['controller' => 'products','action'=>$value['product']['slug']]) ?>" class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/products/'.$value['product']['image'], ['fullBase' => true]) ?> " alt="">
					</a>
					<div class="propose_slider_item_stars">
						<?= $this->element('rating_product', array("item" => $value['product'])); ?>
					</div>
					<div class="propose_slider_item_title">
						<p><a href="<?= $this->Url->build(['controller' => 'products','action'=>$value['product']['slug']]) ?>"><?= $value['product']['title'] ?></a></p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod"><?= $value['product']['cod'] ?></span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<?= $this->element('price_product', array("item" => $value['product'])); ?>
					</div>

					<div class="product_buttons">
						<button class="product_buttons_item add_product_to_bascket" data-product="<?= $value['product']['id'] ?>">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<a href="<?= $this->Url->build(['controller' => 'products','action'=>$value['product']['slug']]) ?>" class="product_buttons_item" >
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
<?php endif; ?>
<section class="about">
		<div class=" about_container container">
			<div class="about_top">
				<p>Про нас </p>
			</div>
			<div class="about_description">
				<p>Наша компанія «ПрофТорг» працює у сфері продажу професійного барно-ресторанного обладнання та пропонує все те, чого потребує сучасна, а тим більше професійна кухня - зручне та функціональне обладнання. Ми готові допомогти Вам підібрати та придбати високоякісне обладнання для кафе, ресторанів, виробничих кухонь, так як є офіційним представником провідних торгових марок виробників кухонного обладнання для ресторанів. У нас Ви підберете повний спектр техніки, необхідної для підприємств громадського харчування, завдяки якому зможете істотно покращити роботу Вашого закладу. Наш інтернет-магазин «ПрофТорг» працює як у сегменті роздрібних, так і оптових продажів. З кожним клієнтом намагаємось налагодити довгострокові відносини завдяки індивідуальному підходу до потреб кожного з наших клієнтів. Скориставшись нашими послугами Ви отримаєте не лише професійне обладнання,яке прослужить Вам довгі роки, а й задоволення від співпраці.</p>
			</div>
	</div>
</section>

<?php if (!empty($products)): ?>
<section class="sales">
	<div class="section_inside container">
		<div class="section_top">
			<div class="section_title">
				<p>Хіти продаж</p>				
			</div>
            <div class="section_title">
            	<a href="<?= $this->Url->build(['controller' => 'categories','action'=>'index/']) ?>" target="_blanck">Переглянути усі категорії</a>
            </div>
		</div>
		<div class="row">
			
		
		<div class="col-sm-4 col-md-3">
			<div class="sales_categories">
               <?php foreach ($products as $key => $value): ?>
				<div class="sales_categories_item">
					<div class="sales_categories_item_image">
						<?= $value['image'] ?>
					</div>
					<div class="sales_categories_item_title">
						<p><?= $key ?></p>
					</div>
				</div>
		<?php endforeach; ?>

				
			</div>
		</div>
		<div class="col-sm-8 col-md-9">
			<div class="sales_list">
				<?php foreach ($products as $key => $value): if (!empty($value)):?>
					<?php  ?>
				<div class="sales_list_item">
					<?php foreach ($value['products'] as $key_two => $item): ?>
			<div class="propose_slider_item <?php if (!empty($item['actions_products'])): ?> propose_slider_item_show_action <?php endif; ?>">
				<div class="propose_slider_item_action"><p>Акція</p></div>
					<a href="<?= $this->Url->build(['controller' => 'products','action'=>$item['slug']]) ?>" class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/products/'.$item['image'], ['fullBase' => true]) ?> " alt="">
					</a>
					<div class="propose_slider_item_stars">
						<?= $this->element('rating_product', array("item" => $item)); ?>
					</div>
					<div class="propose_slider_item_title">
						<p><a href="<?= $this->Url->build(['controller' => 'products','action'=>'view/'.$item['slug']]) ?>"><?= $item['title'] ?></a></p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod"><?= $item['cod'] ?></span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<?= $this->element('price_product', array("item" => $item)); ?>
						
					</div>
					<div class="product_buttons">
						<button class="product_buttons_item add_product_to_bascket" data-product="<?= $item['id'] ?>">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<a href="<?= $this->Url->build(['controller' => 'products','action'=>$item['slug']]) ?>" class="product_buttons_item" >
							<i class="fa fa-eye"></i>
						</a>
						<button class="product_buttons_item add_product_to_wishlist" data-product="<?= $item['id'] ?>">
							<img src="<?= $this->Url->build('/img/favorite.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<i class="fa fa-exchange"></i>
						</button>
					</div>
				</div>	
					<?php endforeach; ?>
				</div>
			<?php endif; endforeach; ?>

				</div>
		</div>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="news">
	<div class="section_inside container">
		<div class="section_top">
			<div class="section_title">
				<p>Свіжі новини</p>				
			</div>
            <div class="section_buttons">
            	<div class="slider_arrow_left">
					<img src="<?= $this->Url->build('/img/arrov_left.svg', ['fullBase' => true]) ?>" alt="">
				</div>
				<div class="slider_arrow_right">
					<img src="<?= $this->Url->build('/img/arrov_right.svg', ['fullBase' => true]) ?>" alt="">
				</div>
            </div>
		</div>
		<div class="news_inside">
			<div class="news_slider">
				<div class="news_slider_item">
					<div class="news_slider_item_image">
						<img src="<?= $this->Url->build('/img/news_image.png', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="news_slider_item_data">
						<p>9 лютого 2020</p>
					</div>
				    <div class="news_slider_item_title">
				    	<p>Новинки у сфері барнного обладнання</p>
				    </div>
				    <div class="news_slider_item_link">
				    	<a href="/">Детальніше</a>
				    </div>
				</div>
				<div class="news_slider_item">
					<div class="news_slider_item_image">
						<img src="<?= $this->Url->build('/img/news_image.png', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="news_slider_item_data">
						<p>9 лютого 2020</p>
					</div>
				    <div class="news_slider_item_title">
				    	<p>Новинки у сфері барнного обладнання</p>
				    </div>
				    <div class="news_slider_item_link">
				    	<a href="/">Детальніше</a>
				    </div>
				</div>
				<div class="news_slider_item">
					<div class="news_slider_item_image">
						<img src="<?= $this->Url->build('/img/news_image.png', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="news_slider_item_data">
						<p>9 лютого 2020</p>
					</div>
				    <div class="news_slider_item_title">
				    	<p>Новинки у сфері барнного обладнання</p>
				    </div>
				    <div class="news_slider_item_link">
				    	<a href="/">Детальніше</a>
				    </div>
				</div>
				<div class="news_slider_item">
					<div class="news_slider_item_image">
						<img src="<?= $this->Url->build('/img/news_image.png', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="news_slider_item_data">
						<p>9 лютого 2020</p>
					</div>
				    <div class="news_slider_item_title">
				    	<p>Новинки у сфері барнного обладнання</p>
				    </div>
				    <div class="news_slider_item_link">
				    	<a href="/">Детальніше</a>
				    </div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="producer">
	<div class="section_inside container">
		<div class="section_top">
			<div class="section_title">
				<p>Виробники</p>				
			</div>
            <div class="section_buttons">
            	<div class="slider_arrow_left">
					<img src="<?= $this->Url->build('/img/arrov_left.svg', ['fullBase' => true]) ?>" alt="">
				</div>
				<div class="slider_arrow_right">
					<img src="<?= $this->Url->build('/img/arrov_right.svg', ['fullBase' => true]) ?>" alt="">
				</div>
            </div>
		</div>
		<div class="producer_inside">	
		<div class="producer_slider">

			<?php foreach ($producers as $key => $value): ?>
				<a href="<?= $this->Url->build(['controller' => 'producers','action'=>$value['slug']]) ?>">
					<img src="<?= $this->Url->build('/producers/'.$value['image'], ['fullBase' => true]) ?>" alt="">
				</a>
			<?php endforeach; ?>

		</div>
		</div>
	</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script>
    <?php echo $this->Html->scriptStart(['block' => true]); ?>
    
    if ($(window).width() > 768) {
    	$(".propose_left").addClass('propose_left_active');
	}
	
	$('.slider_inialize').slick({
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,
  slidesToShow: 1,
  slidesToScroll: 1
});  


$('.products_slider').slick({
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 6,
  responsive: [
  {
  	breakpoint: 768,
    settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
    },
    breakpoint: 993,
    settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
    },
  }]
});  

$('.propose_slider').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
  {
    breakpoint: 993,
    settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
    },
    breakpoint: 768,
    settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
    }
  }]
});  

$('.producer_slider').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
  {
    breakpoint: 993,
    settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
    },
    breakpoint: 768,
    settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
    }
  }]
});  

$('.news_slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
   responsive: [
  {
    breakpoint: 993,
    settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
    },
    breakpoint: 768,
    settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
    }
  }]
}); 

$(".slider_arrow_left").click(function() {
 $(this).parent().parent().parent().find('.slick-prev.slick-arrow').first().trigger('click')
});

$(".slider_arrow_right").click(function() {
 $(this).parent().parent().parent().find('.slick-next.slick-arrow').first().trigger('click')
});

$(".add_product_to_wishlist").click(function() {
   
   var id_product = $(this).attr("data-product");

   $.ajax({
        url: '<?= $this->Url->build(['controller' => 'wishlist', 'action' => 'add', '_full' => true]) ?>',
        method: 'POST',
      	data: { "id_product": id_product},
      	success: function(data){ 
        	alert("Додано");
        }
    });

});

	<?php echo $this->Html->scriptEnd(); ?>
</script>