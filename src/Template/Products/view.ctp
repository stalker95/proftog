<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<div class="breadcrums">
	<div class="breadcrums_list">
		<div class="breadcrums_list_item">
			<a href="<?= $this->Url->build(['controller' => 'main','action'    =>  'index']) ?>">Головна</a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'categories','action'    =>  'index']) ?>">Категорії</a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'categories','action'    =>  'view/'.$product->category->slug]) ?>"><?= $product->category->name; ?></a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'products','action'    =>  'view/'.$product->slug]) ?>"><?= $product->title ?></a>
			<span> / </span>
			
		</div>
	</div>
</div>
<div class="white_container container">
	

	<div class="product container">
				<div class="product_left">
					<img src="<?= $this->Url->build('/products/'.$product->image, ['fullBase' => true]) ?>" alt="">
				</div>
				<div class="product_right">
					<div class="product_title">
						<p><?= $product->title ?></p>
					</div>
					<div class="product_stars">
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
					<div class="product_price">
						<p><span class="translate_price"><?= $product->price ?></span> грн</p>
					</div>
					<div class="product_description">
						<p><?= $product->description ?></p>
					</div>
					<div class="product_shop">
						<div class="product_shop_counter">
							<div class="product_shop_counter_left"><i class="fa fa-minus"></i></div>
							<output name="result" class="product_shop_counter_center">1</output>
							<div class="product_shop_counter_right"><i class="fa fa-plus"></i></div>
						</div>
						<div class="product_shop_buy">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
							<p>Купити</p>
						</div>
					</div>
					<div class="product_buttons">
						<button>
							<i class="fa fa-heart"></i>
							В обрані
						</button>
						<button>
							<i class="fa fa-exchange"></i>
							Порівняти
						</button>
					</div>
					<div class="product_paramth">
						<?php foreach ($option_group as $key => $value):?>
						<div class="product_paramth_item">
							<div class="product_paramth_title">
								<?= $key; ?>
							</div>
							<div class="product_paramth_select">
								
								<select name="" id="" class="change_price">
									<option value="">Виберіть опцію</option>
									<?php foreach ($value as $key => $item): ?>
										<option value="<?= $item['name'] ?>"><?= $item['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					<?php endforeach; ?>
					</div>

				</div>
				
		</div>
		<div class="product container">
				<div class="product_tabs">
					<div class="product_tabs_top">
						<p class="product_tabs_top_item product_tabs_top_item_active">Опис</p>
						<p class="product_tabs_top_item">Характеристики</p>
						<p class="product_tabs_top_item">Відеогляд</p>
						<p class="product_tabs_top_item">Відгуки (0)</p>
					</div>
					<div class="product_tabs_container">
                        <div class="product_tabs_item" style="display: block;">
                        	<?= $product->description; ?>
                        </div>
                         <div class="product_tabs_item">
                         	<table class="products_attributes_table">
                         		<thead>
                         			<th></th>
                         			<th></th>
                         		</thead>
                         		<tbody>
                         			<?php foreach ($attributes_products as $key => $value) :?>
                         				<tr>
                         					<td><?= $value['attributes_item']['name'] ?></td>
                         					<td><?= $value['value']; ?></td>
                         				</tr>
											
									<?php endforeach; ?>
                         		</tbody>
                         	</table>
                        </div>
                         <div class="product_tabs_item">
                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cupiditate expedita, sed, numquam sunt autem quaerat dolorem atque explicabo, odio blanditiis. Quas saepe, et repellat ducimus, placeat consectetur. Dolorem, pariatur!</p>
                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cupiditate expedita, sed, numquam sunt autem quaerat dolorem atque explicabo, odio blanditiis. Quas saepe, et repellat ducimus, placeat consectetur. Dolorem, pariatur!</p>
                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cupiditate expedita, sed, numquam sunt autem quaerat dolorem atque explicabo, odio blanditiis. Quas saepe, et repellat ducimus, placeat consectetur. Dolorem, pariatur!</p>
                        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cupiditate expedita, sed, numquam sunt autem quaerat dolorem atque explicabo, odio blanditiis. Quas saepe, et repellat ducimus, placeat consectetur. Dolorem, pariatur!</p>
                        	v
                        </div>
                         <div class="product_tabs_item">
                            <p class="product_tabs_item_title">Відгуків про даний товар не має </p>
                            <p class="product_tabs_item_first">Станьте першим, хто оцінить продукт <?= $product->title ?></p>
                            <p class="product_tabs_item_email">Ваш email адресу не буде опубліковано. Заповніть відповідні поля.
                            </p>
                        	<div class="products_tabs_item_form">
                        		<p>Оцінка</p>
                        		<div class="products_tabs_item_form_stars">
                        			
                        		</div>
                        		<div class="products_tabs_item_form_textarea">
                        			<textarea name="" id="" cols="30" rows="10"></textarea>
                        		</div>
                        		<div class="products_tabs_item_form_inputs">
                        			<label for="user_name">Ваше ім'я<br>
                        				<input type="text" name="user_name" id="user_name">
                        			</label>
                        			<label for="user_email">Email<br>
                        				<input type="email" name="user_email" id="user_email">
                        			</label>
                        		</div>
                        		<div class="products_tabs_item_form_submit">
                        			<input type="submit" value="Залишити відгук">
                        		</div>
                        	</div>
                        </div>
					</div>
				</div>			
		</div>

<div class="propose product_propose">
	<div class="propose_title product_propose_title">
		Подібні товари 
	</div>
			<div class=" propose_top propose_top_right container">
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
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
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
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
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
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
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
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						
					</div>
				</div>
		</div>
	</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script>
    <?php echo $this->Html->scriptStart(['block' => true]); ?>
$(document).ready(function() {

var flickerAPI = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";
  $.getJSON( flickerAPI, {
    tags: "mount rainier",
    tagmode: "any",
    format: "json"
  })
  .done(function(data) {
    global_curs = data[0]['buy'];
  });

    var id_product = <?= $product->id ?>;
    var products_options = <?= $option_group_json ?>;
    var start_price = <?= $product->price ?> * global_curs;
     start_price = start_price * global_curs;
     alert(global_curs);
    var count_id_bascket = 1;

	var total_options = new Map();
	var total_options_name = new Map();
	var array_options_name = new Map();

$(".change_price").change(function() {
  /* var index = $(this).parent().parent().find('.product_paramth_title').text();
   var str = index.toString();
   str = str.replace(' ', '').trim();

    //console.log(products_options[str]);
    for (i = 0; i < products_options[str].length; i++) {
    	 //console.log(products_options[str][i]['name']);
    	if (products_options[str][i]['name'] == $(this).val()) {
          console.log(products_options[str][i]['products_options'][0]['value']);
    	}
    } */
    change_price();
});

function change_price() {
	 total_options = [];
	 array_options_name = [];
	 total_options_name = [];

	var new_price = 0;
	 $(".change_price").each(function() {
	 	  var index = $(this).parent().parent().find('.product_paramth_title').text();
   var str = index.toString();
   str = str.replace(' ', '').trim();

  //  console.log(products_options[str]);
    for (i = 0; i < products_options[str].length; i++) {
    	 //console.log(products_options[str][i]['name']);
    	if (products_options[str][i]['name'] == $(this).val()) {
         array_options_name.push(str);
         // console.log(products_options[str][i]['products_options'][0]['value']);
         console.log(products_options[str][i]['name']);
         var key = products_options[str][i]['name'].toString();
         if ( products_options[str][i]['products_options'][0]['value']) {
         	total_options_name.push(products_options[str][i]['name'].toString());
          total_options.push(products_options[str][i]['products_options'][0]['value']);
         }
          new_price = new_price + products_options[str][i]['products_options'][0]['value'];
    	}
    }
	 });
	     console.log(array_options_name);
    console.log(total_options_name);
    console.log(total_options);
	 new_price = start_price + new_price;
	 $(".product_price p ").text(new_price);
}

$(".product_shop_counter_right").click(function() {
   count_id_bascket++;
   $(".product_shop_counter_center").text(count_id_bascket);
});

$(".product_shop_counter_left").click(function() {
   count_id_bascket--;
   if (count_id_bascket <=1) {
   	count_id_bascket = 1;
   }
   $(".product_shop_counter_center").text(count_id_bascket);
});


	$('.slider_inialize').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1
});  


$('.products_slider').slick({
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 6
});  

$('.propose_slider').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1
});  

$('.producer_slider').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1
});  

$('.news_slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1
}); 

$(".slider_arrow_left").click(function() {
 $(this).parent().find('.slick-prev.slick-arrow').trigger('click')
});

$(".slider_arrow_right").click(function() {
 $(this).parent().find('.slick-next.slick-arrow').trigger('click')
});

$(document).ready(function() {
  
  $(".product_shop_buy").click(function() {
    $.ajax({
        url: '<?= $this->Url->build(['controller' => 'carts', 'action' => 'add', '_full' => true]) ?>',
        method: 'POST',
  		data: { "product_id": id_product, "total_options":total_options, "array_options_name":array_options_name, "total_options_name":total_options_name, "count_id_bascket":count_id_bascket  },
  		success: function(data){ 
    		alert("Додано");
        }
  	});

  });

});
});
	<?php echo $this->Html->scriptEnd(); ?>
</script>