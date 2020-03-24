
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
								<img src="<?= $this->Url->build('/img/delivery.svg', ['fullBase' => true]) ?>" alt="">
							</div>
							<div class="advantages_item_right">
								<p>Професійне консультування</p>
							</div>
						</div>
						<div class="advantages_item">
							<div class="advantages_item_left">
								<img src="<?= $this->Url->build('/img/delivery.svg', ['fullBase' => true]) ?>" alt="">
							</div>
							<div class="advantages_item_right">
								<p>Гарантія на весь товар</p>
							</div>
						</div>
					</div>
					<div class="center_slider">
						<div class="slider_arrow_left">
							<i class="fa fa-chevron-left"></i>
						</div>
						<div class="slider_arrow_right">
							<i class="fa fa-chevron-right"></i>
						</div>

						<div class="slider_inialize">
							<div>	
							<div class="center_slider_item">
								<div class="center_slider_item_left">
									<p class="center_slider_title">
										SP MINI E REAL FORNI<br>
										Ротановая печь 
									</p>

									<a href="/" class="center_slider_link">Детальніше</a>
								</div>
								<div class="center_slider_item_right">
									<img src="<?= $this->Url->build('/img/sample for slide.png', ['fullBase' => true]) ?>" alt="">
								</div>
							</div>
						</div>
							<div>
							<div class="center_slider_item">
								<div class="center_slider_item_left">
									<p class="center_slider_title">
										SP MINI E REAL FORNI<br>
										Ротановая печь 
									</p>

									<a href="/" class="center_slider_link">Детальніше</a>
								</div>
								<div class="center_slider_item_right">
									<img src="<?= $this->Url->build('/img/sample for slide.png', ['fullBase' => true]) ?>" alt="">
								</div>
							</div>
						</div>
						<div>
							<div class="center_slider_item">
								<div class="center_slider_item_left">
									<p class="center_slider_title">
										SP MINI E REAL FORNI<br>
										Ротановая печь 
									</p>

									<a href="/" class="center_slider_link">Детальніше</a>
								</div>
								<div class="center_slider_item_right">
									<img src="<?= $this->Url->build('/img/sample for slide.png', ['fullBase' => true]) ?>" alt="">
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="products">
	<div class="container">
		<div class="slider_arrow_left">
							<i class="fa fa-chevron-left"></i>
						</div>
						<div class="slider_arrow_right">
							<i class="fa fa-chevron-right"></i>
						</div>
			<div class="products_slider">
				<?php foreach ($categories as $key => $value): if ($value['parent_id'] == 0) :?>
				<div>
					<a href="<?= $this->Url->build(['controller' => 'categories','action'=>'view/'.$value['slug']]) ?>" class="products_slider_item">
						<?= $value['image'] ?>
					</a>
				</div>
			<?php endif; endforeach; ?>
				

				

				
				
				
				
			</div>
	</div>
</section>
<div class="propose">
			<div class=" propose_top container">
		<p class="propose_title">Пропозиція дня</p>
		<div class="propose_arrows">
			<div class="slider_arrow_left">
				<i class="fa fa-chevron-left"></i>
			</div>
			<div class="slider_arrow_right">
				<i class="fa fa-chevron-right"></i>
			</div>
		</div>	
</div>
	<div class="propose_container container">
		<div class="propose_slider">
				<div class="propose_slider_item">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/img/product_item.png', ['fullBase' => true]) ?> " alt="">
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
						<p>Апарат для шаурми </p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod">25456</span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<p>3100 грн</p>
					</div>
					<div class="product_buttons">
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item add_product_to_wishlist" data-product="2">
							<img src="<?= $this->Url->build('/img/favorite.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
					</div>
				</div>
								<div class="propose_slider_item">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/img/product_item.png', ['fullBase' => true]) ?> " alt="">
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
						<p>Апарат для шаурми </p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod">25456</span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<p>3100 грн</p>
					</div>
					<div class="product_buttons">
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item add_product_to_wishlist" data-product="6">
							<img src="<?= $this->Url->build('/img/favorite.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
					</div>
				</div>
								<div class="propose_slider_item">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/img/product_item.png', ['fullBase' => true]) ?> " alt="">
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
						<p>Апарат для шаурми </p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod">25456</span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<p>3100 грн</p>
					</div>
					<div class="product_buttons">
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item add_product_to_wishlist" data-product="3">
							<img src="<?= $this->Url->build('/img/favorite.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
					</div>
				</div>
								<div class="propose_slider_item">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/img/product_item.png', ['fullBase' => true]) ?> " alt="">
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
						<p>Апарат для шаурми </p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod">25456</span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<p>3100 грн</p>
					</div>
					<div class="product_buttons">
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item add_product_to_wishlist" data-product="4">
							<img src="<?= $this->Url->build('/img/favorite.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
					</div>
				</div>
		</div>
	</div>
</div>
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

<section class="sales">
	<div class="section_inside container">
		<div class="section_top">
			<div class="section_title">
				<p>Хіти продаж</p>				
			</div>
            <div class="section_title">
            	<a href="">Переглянути усі категорії</a>
            </div>
		</div>
		<div class="row">
			
		
		<div class="col-sm-4 col-md-3">
			<div class="sales_categories">
				<div class="sales_categories_item">
					<div class="sales_categories_item_image">
						<img src="<?= $this->Url->build('/img/refrigerator.svg', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="sales_categories_item_title">
						<p>Барне та ресторанне обладнання </p>
					</div>
				</div>
				<div class="sales_categories_item sales_categories_item_active">
					<div class="sales_categories_item_image ">
						<img src="<?= $this->Url->build('/img/refrigerator.svg', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="sales_categories_item_title">
						<p>Барне та ресторанне обладнання </p>
					</div>
				</div>
				<div class="sales_categories_item">
					<div class="sales_categories_item_image">
						<img src="<?= $this->Url->build('/img/refrigerator.svg', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="sales_categories_item_title">
						<p>Барне та ресторанне обладнання </p>
					</div>
				</div>
				<div class="sales_categories_item">
					<div class="sales_categories_item_image">
						<img src="<?= $this->Url->build('/img/refrigerator.svg', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="sales_categories_item_title">
						<p>Барне та ресторанне обладнання </p>
					</div>
				</div>
				<div class="sales_categories_item">
					<div class="sales_categories_item_image">
						<img src="<?= $this->Url->build('/img/refrigerator.svg', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="sales_categories_item_title">
						<p>Барне та ресторанне обладнання </p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-8 col-md-9">
			<div class="sales_list">
			<div class="propose_slider_item">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/img/product_item.png', ['fullBase' => true]) ?> " alt="">
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
						<p>Апарат для шаурми </p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod">25456</span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<p>3100 грн</p>
						<p class="slider_item_price_old">3300 грн</p>
						<p class="slider_item_discount"> -11%</p>
					</div>
				</div>
												<div class="propose_slider_item ">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/img/product_item.png', ['fullBase' => true]) ?> " alt="">
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
						<p>Апарат для шаурми </p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod">25456</span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<p>3100 грн</p>
					</div>
				</div>
												<div class="propose_slider_item">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/img/product_item.png', ['fullBase' => true]) ?> " alt="">
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
						<p>Апарат для шаурми </p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod">25456</span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<p>3100 грн</p>
					</div>
				</div>
												<div class="propose_slider_item">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/img/product_item.png', ['fullBase' => true]) ?> " alt="">
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
						<p>Апарат для шаурми </p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod">25456</span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
				</div>
				</div>
		</div>
		</div>
	</div>
</section>

<section class="news">
	<div class="section_inside container">
		<div class="section_top">
			<div class="section_title">
				<p>Свіжі новини</p>				
			</div>
            <div class="section_buttons">
            	<div class="slider_arrow_left">
					<i class="fa fa-chevron-left"></i>
				</div>
				<div class="slider_arrow_right">
					<i class="fa fa-chevron-right"></i>
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
					<i class="fa fa-chevron-left"></i>
				</div>
				<div class="slider_arrow_right">
					<i class="fa fa-chevron-right"></i>
				</div>
            </div>
		</div>
		<div class="producer_inside">	
		<div class="producer_slider">
			<a href="/">
				<img src="<?= $this->Url->build('/img/adv.png', ['fullBase' => true]) ?>" alt="">
			</a>
			<a href="/">
				<img src="<?= $this->Url->build('/img/adv.png', ['fullBase' => true]) ?>" alt="">
			</a>
			<a href="/">
				<img src="<?= $this->Url->build('/img/adv.png', ['fullBase' => true]) ?>" alt="">
			</a>

			<a href="/">
				<img src="<?= $this->Url->build('/img/adv.png', ['fullBase' => true]) ?>" alt="">
			</a>
			<a href="/">
				<img src="<?= $this->Url->build('/img/adv.png', ['fullBase' => true]) ?>" alt="">
			</a>
			<a href="/">
				<img src="<?= $this->Url->build('/img/adv.png', ['fullBase' => true]) ?>" alt="">
			</a>

			<a href="/">
				<img src="<?= $this->Url->build('/img/adv.png', ['fullBase' => true]) ?>" alt="">
			</a>
		</div>
		</div>
	</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script>
    <?php echo $this->Html->scriptStart(['block' => true]); ?>
	$('.slider_inialize').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1
});  


$('.products_slider').slick({
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 6,
  responsive: [
  {
    breakpoint: 993,
    settings: {
        slidesToShow: 5,
        slidesToScroll: 5,
    },
    breakpoint: 768,
    settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
    }
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
        slidesToScroll: 1,
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
 $(this).parent().find('.slick-prev.slick-arrow').trigger('click')
});

$(".slider_arrow_right").click(function() {
 $(this).parent().find('.slick-next.slick-arrow').trigger('click')
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