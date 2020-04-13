<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>
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
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod"><?= $product->cod ?></span></p>
					</div>
					<div class="product_price">
						
							<p><?= $this->element('price_product', array("item" => $product)); ?> </p>
						
					</div>
					<div class="product_status">
						<?php 	if ($product->amount > 0 ) { ?>
							<p class="on_sklad">На складі</p>
						<?php 	} ?>
						<?php if ($product->in_orders == true) { ?>
						<p class="in_orders">Під замовлення</p>
					<?php } ?>
					</div>
					<div class="product_description">
						<?php echo htmlspecialchars_decode($product->description) ?>
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
						<div class="products_quick_buy"  data-toggle="modal" data-target="#exampleModal">
							<div class="products_quick_buy_left">
								<i class="fa fa-dollar"></i>
							</div>
							<p>Швидке замовлення</p>
						</div>
					</div>
					<div class="product_buttons"  data-product="2">
						<button class="add_product_to_wishlist" data-product="2">
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
						<p class="product_tabs_top_item">Відгуки (<?= count($product->rewiev); ?>)</p>
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
                        	  <form action="" class="review_product">
                        		<p class="products_tabs_item_form_title">Оцінка</p>
                        		<div class="products_tabs_item_form_stars clearfix">
                        			<input type="hidden" name="id_product" value="<?= $product->id ?>">
                        			<fieldset class="rating">
    									<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    									<input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    									<input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    									<input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    									<input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    									<input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    									<input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    									<input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    									<input type="radio" id="star1" name="rating" value="1" checked /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    									<input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
								</fieldset>
                        		</div>
                        		<div class="products_tabs_item_form_textarea">
                        			<p>Ваш відгук <span class="important_star">*</span></p>
                        			<textarea name="comment" id="" cols="30" rows="10" class="clear_input"></textarea>
                        		</div>
                        		<div class="products_tabs_item_form_inputs">
                        			<label for="user_name">Ваше ім'я <span class="important_star">*</span><br>
                        				<input type="text" name="user_name" id="user_name" class="clear_input">
                        			</label>
                        			<label for="user_email">Email <span class="important_star">*</span><br>
                        				<input type="email" name="user_email" id="user_email" class="clear_input">
                        			</label>
                        		</div>
                        		<div class="products_tabs_item_form_submit">
                        			<input type="submit" value="Залишити відгук">
                        		</div>
                        		<div class="rewiew_message">
                        			
                        		</div>
                        	  </form>
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
			<?php 	foreach ($products as $key => $value): ?>
				<div class="propose_slider_item">
					<div class="propose_slider_item_image">
						<img src="<?= $this->Url->build('/img/product_item.png', ['fullBase' => true]) ?> " alt="">
					</div>
					<div class="propose_slider_item_stars">
						<div class="product-star-item">
							<span class="fa fa-star-o" data-rating="3"></span>
						</div>
						<div class="product-star-item">
							<span class="fa fa-star-o" data-rating="3"></span>
						</div>
						<div class="product-star-item">
							<span class="fa fa-star-o" data-rating="3"></span>
						</div>
						<div class="product-star-item">
							<span class="fa fa-star-o" data-rating="3"></span>
						</div>
						<div class="product-star-item">
							<span class="fa fa-star-o" data-rating="3"></span>
						</div>
						 <input type="hidden" name="whatever1" class="rating-value" value="2.56">
					</div>
					<div class="propose_slider_item_title">
						<p><?= $value['title']; ?></p>
					</div>
					<div class="propose_slider_item_kod">
						<p>Код товару <span class="item_kod"><?= $value['cod'] ?></span></p>
					</div>
					<div class="propose_slider_item_status">
						<p class="on_sklad">На складі</p>
					</div>
					<div class="propose_slider_item_price">
						<p>p <span class="translate_price"><?= $value['price']; ?></span> грн</p>
					</div>
					<div class="product_buttons">
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item add_product_to_wishlist" data-product="<?= $value['id'] ?>">
							<img src="<?= $this->Url->build('/img/favorite.svg', ['fullBase' => true]) ?>" alt="">
						</button>
						<button class="product_buttons_item">
							<img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
						</button>
					</div>
				</div>
              <?php 	endforeach; ?>
		</div>
	</div>
</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content quick_buy_modal">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Швидке замовлення</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body quick_buy_form">
        <form action="" class="quick_buy_form_submit">
        	<p class="quick_buy_form_title">Заповніть данні і наш менеджер звяжеться з вами</p>
        	<input type="text" name="user_name" placeholder="Ваше ім'я" required="true">
        	<input type="text" name="user_phone" placeholder="Ваш номер телефону" required="true">
        	<input type="hidden" name="product_id" value="<?= $product->id  ?>">
        	<div class="quick_buy_form_bottom">
        		<!-- 2 -->
				<div class="loader loader--style2 " title="1">
  					<svg version="1.1" id="loader-1" class="auth_loader" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     				width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
  					<path fill="#fff" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
    				<animateTransform attributeType="xml"
      									attributeName="transform"
      									type="rotate"
     									 from="0 25 25"
      									to="360 25 25"
      									dur="0.6s"
      									repeatCount="indefinite"/>
    				</path>
  					</svg>
				</div>
                <input type="submit" value="Підтвердити" class="quick_submit">
        	</div>
        	<div class="message_submit_quick_order"></div>
        </form>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --> 
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    <?php echo $this->Html->scriptStart(['block' => true]); ?>

$(document).ready(function() {

    var id_product = <?= $product->id ?>;
    var currency = <?= $product->currency_id ?>;

    var products_options = <?= $option_group_json ?>;
    var start_price = <?= $product->price ?> * global_curs;
     start_price = start_price * global_curs;
     setTimeout(function() {
     	if (currency == 1) {
           global_curs = 1;
     	}
start_price = start_price * global_curs;

     }, 700);
    var count_id_bascket = 1;

	var total_options = new Map();
	var total_options_name = new Map();
	var array_options_name = new Map();
 $(".review_product").submit(function() {
       event.preventDefault(); 
        
       var element = $(this);
       $(this).parent().find('.hide_submit').css("display",'none');
       $(this).parent().find(".loader_svg").css('display','block');

       console.log($(this).serialize());
       $.ajax({
        url: '<?= $this->Url->build(['controller' => 'rewiev', 'action' => 'insert-comment', '_full' => true]) ?>',
        type: 'POST',
        data: $(this).serialize(),
        success: function(data){ 
             alert("Комантар додано");
             $(".clear_input").val("");
             $(".clear_input").text("");
             console.log(data);

             if (data.status == false) {
             	$(".rewiew_message").html("<p class='rewiew_message_alert btn-danger'><strong>Увага</strong> "+data.message+"</p>");
             }
             if (data.status == true) {
             	$(".rewiew_message").html("<p class='rewiew_message_good btn-success'><strong>Увага</strong> "+data.message+"</p>");
             }
        }
     });
     });
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
          new_price = new_price + ( products_options[str][i]['products_options'][0]['value'] * global_curs);
          alert(new_price);
    	}
    }
	 });
	     console.log(array_options_name);
    console.log(total_options_name);
    console.log(total_options);
    alert(start_price);
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


	var $star_rating = $('.products_tabs_item_form_stars .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();

$(document).ready(function() {
 
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

$(document).ready(function() {
    $(".quick_buy_form_submit").submit(function() {
       event.preventDefault(); 
       $('.auth_loader').css("display","inline-block");
       $(".quick_submit").css("display","none");
       $.ajax({
        url: '<?= $this->Url->build(['controller' => 'quick-orders', 'action' => 'quick-order', '_full' => true]) ?>',
        type: 'POST',
        data: $(this).serialize(),
        success: function(data){ 
          $(".message_submit_quick_order").html("");
          console.log()

          if (data.status == "true")
           {

            setTimeout(function() {
               $(".message_submit_quick_order").html('<div class="message_submit_quick_order_message">'+
                ''+
                '<strong>Увага!</strong> Ваше замовлення прийнято'+
                '</div>');

               $('.auth_loader').css("display","none");
       		   $(".quick_submit").css("display","block");
       		   $(".quick_buy_form_submit input[type='text']").val("");
       		   $(".quick_buy_form_submit input[type='number']").val("");
             },1000); 
           }

           
        }
     });
    }); 
});
	<?php echo $this->Html->scriptEnd(); ?>
</script>