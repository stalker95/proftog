<div class="modal fade" id="basket" tabindex="-1" role="dialog" aria-labelledby="basketlabel" aria-hidden="true">
  <div class="modal-dialog basket_modal modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="basketlabel">Корзина</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body quick_buy_form">
        <?php if (isset($_SESSION['cart']) AND !empty($_SESSION['cart']) ) { ?>
            <div class="bascket_container"> 
        <?php } else { ?>
            <div class="bascket_container_empty"> 
              <p class="bascket_container_empty_title">Ваш кошик покупок пустий</p>
        <?php } ?>
          
          <?php if (isset($_SESSION['cart'])): ?>
            <?php //debug($_SESSION['cart']); ?>
            <?php   foreach ($_SESSION['cart'] as $key => $value): ?>
          
           <div class="bascket_item">
            <button class="bascket_delete">
              <i class="fa fa-trash display_bascket_popup"></i>
              <div class="popup_bascket_item">
                <div class="popup_bascket_item_top">
                  <div class="popup_bascket_item_wishlist add_product_to_wishlist" data-product="<?= $value['product']['id'] ?>">
                    <div class="popup_bascket_item_icon">
                      <i class="fa fa-heart"></i>
                    </div>
                    <div class="popup_bascket_item_description">
                      <p>Перемістити до списку бажань </p>
                    </div>
                  </div>
                  <div class="popup_bascket_item_delete" data-product="<?= $key ?>">
                    <div class="popup_bascket_item_icon">
                      <i class="fa fa-trash"></i>
                    </div>
                    <div class="popup_bascket_item_description">
                      <p>Видалити без збереження</p>
                    </div>
                  </div>
                  </div>
                  <div class="popup_bascket_item_bottom">
                    <p>Скасувати</p>
                  </div>
                
              </div>
            </button>
             <div class="bascket_item_left">
               <img src="<?= $this->Url->build('/products/'.$value['product']['image'], ['fullBase' => true]) ?>" alt="">
             </div>
             <div class="bascket_item_right">
               <div class="bascket_item_right_title">
                 <p><?= $value['product']['title'] ?></p>
               </div>
               <div class="bascket_item_right_prices">
                 <div class="bascket_item_price">
                   <p><span class="translate_price" data-currency="<?=$value['product']['currency_id'] ?>"><?= $value['product']['price']  ?></span> грн</p>
                 </div>
                 <div class="bascket_item_buttons">
                   <div class="bascket_item_buttons_inside">
                     <div class="bascket_item_buttons_minus">
                       <i class="fa fa-minus"></i>
                     </div>
                     <output class="bascket_item_buttons_output"><?= $value['count'] ?></output>
                     <div class="bascket_item_buttons_plus">
                       <i class="fa fa-plus"></i>
                     </div>
                   </div>
                 </div>
                 <div class="bascket_item_price_total">
                   <p><span class="translate_price total_basket" data-currency="<?=$value['product']['currency_id'] ?>"><?= ($value['count'] * $value['product']['price']) + (array_sum($value['array_option_value']) * $value['count']); ?></span> грн</p>
                 </div>
               </div>
             </div>
           </div>
         <?php  endforeach; ?>

           <?php endif; ?>

        </div>
        <div class="bascet_total">
          <div class="bascet_total_left"></div>
          <div class="bascet_total_right">
            <span>Разом: </span><span><strong class="total_of_bascket"></strong> грн</span>
          </div>
          
        </div>
        <div class="bascket_bottom">
          <div class="bascet_bottom_left">
            <a href="#" data-dismiss="modal">Продовжити покупки</a>
          </div>
          <div class="bascet_bottom_right">
                <a href="<?= $this->Url->build(['controller' => 'orders','action'=>'index']) ?>" class="bascet_bottom_right_link">Оформити
                </a>
          </div>
        </div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --> 
    </div>
  </div>
</div>

<!--<div class="modal fade" id="after_add_bascket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content ">
     <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-content quick_buy_modal">
      <div class="modal-body quick_buy_form added_to_cart_modal">
        <h5>Ваше замовлення прийнято</h5>
        <div class="added_to_cart">
          <button class="btn btn-primary " data-dismiss="modal" aria-label="Close">OK</button>
        </div>
      </div>
    </div>
</div>
  </div>
</div> -->