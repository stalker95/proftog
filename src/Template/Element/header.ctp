<?php //  debug($categories); ?>
<header>
    <div class="header_top">
       <div class="container">
        <div class="header_top_inside d-flex">
        <div class="header_top_left">
            <div class="header_top-item">
                <a href="<?= $this->Url->build(['controller' => 'wishlist','action'=>'index']) ?>">
                   <i class="fa fa-heart"></i>
                    Список бажань (<?php if (isset($_SESSION['wishlist'])){ echo count($_SESSION['wishlist']); } else { echo "0"; } ?>) 
                </a>
                <a href="<?= $this->Url->build(['controller' => 'compares','action'=>'index']) ?>">
                    <i class="fa fa-exchange"></i>
                    Список порівнянь
                </a>
            </div>
        </div>
        <div class="header_top_right">
            <div class="header_top-item">
                <a href=".">
                    <i class="fa fa-map-marker"></i>
                    <?= $settings->address ?>  
                </a>
                <a href="tel:093 000 000">
                   <i class="fa fa-phone"></i>
                    <?= str_replace('<br>', ' ', $settings->phones) ?>  
                </a>     
            </div>
        </div>
        </div>
        <div class="header_mobile">
            <div class="header_mobile_top">
                <i class="fa fa-chevron-down"></i>
            </div>
            <div class="header_mobile_list">
                <div class="header_mobile_list_item">
                    <div class="header_mobile_list_image">
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="header_mobile_list_title">
                        Список бажань (<?php if (isset($_SESSION['wishlist'])  AND is_array($_SESSION['wishlist'])) {echo count($_SESSION['wishlist']);} else { echo "0"; } ?>) 
                    </div>
                </div>
                <div class="header_mobile_list_item">
                    <div class="header_mobile_list_image">
                        <i class="fa fa-exchange"></i>
                    </div>
                    <div class="header_mobile_list_title">
                        м.Львів вул Зелена 15
                    </div>
                </div>
                <div class="header_mobile_list_item">
                    <div class="header_mobile_list_image">
                        <i class="fa fa-exchange"></i>
                    </div>
                    <div class="header_mobile_list_title">
                        м.Львів вул Зелена 15
                    </div>
                </div>

                <div class="header_mobile_list_item">
                    <div class="header_mobile_list_image">
                        <i class="fa fa-exchange"></i>
                    </div>
                    <div class="header_mobile_list_title">
                        м.Львів вул Зелена 15
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div>
    <div class="container">
        <div class="header_center">
                    <div class="header_logo">
                        <a href="/">
                            <img src="<?= $this->Url->build('/img/logo2.png', ['fullBase' => true]) ?>" alt="">
                        </a>
                    </div>
                    <div class="header_center_form hide_mobile">
                        <form action="">
                           <!-- <div class="custom-select" >
                                <select name="category" >
                                    <?php foreach ($categories as $key => $value): if ($value['parent_id']): ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    
                                <?php endif; endforeach; ?>
                                </select>
                            </div> -->
                            <input type="text" class="header_center_text outline-none" placeholder="Пошук продуктів" autocomplete="off" name="search">
                            <label for="submit" class="header_center_submit">
                                <img src="<?= $this->Url->build('/img/search.svg', ['fullBase' => true]) ?>" alt="">
                                <input type= "submit" value="Надіслати" name="submit">
                            </label>
                            <span class="hide_search">
                              <i class="fa fa-close"></i>
                            </span>
                        </form>
                        <div class="header_search_block" >
                          <div class="header_search_loader">
                             <!-- 3  -->
<div class="loader loader--style3" title="2" >
  <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
  <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
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

                          </div>
                          <div class="header_search_products">
                           
                          </div>
                        </div>
                    </div>
                    <div class="header_center_right hide_mobile">
                        <a  data-toggle="modal" data-target="#basket" class="header_center-link">
                            <div class="header_center-link_circle">
                                <img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
                            </div>
                            <div class="header_center-link-description">
                                <p class="header_center-link-title">Корзина</p>
                                <p class="header_center-link-subtitle"><span class="count_of_bascket"><?php if (isset($_SESSION['cart'])  AND is_array($_SESSION['cart'])) {echo count($_SESSION['cart']);} else { echo "0"; } ?></span> товар</p>
                            </div>
                        </a>
                        <a href="<?= $this->Url->build(['controller' => 'cabinet','action'    =>  'index']) ?>" class="header_center-link">
                            <div class="header_center-link_circle">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="header_center-link-description">
                                <p class="header_center-link-title">Кабінет</p>
                                <p class="header_center-link-subtitle"> <?php   if (isset($user->firstname)) { echo strstr($user->mail, '@', true);;} ?>  </p>
                            </div>      
                        </a>
                </div>
                 <div class="header_buttons_mobile">
                <div class="header_search">
                    <div class="header_search_top">
                        <img src="<?= $this->Url->build('/img/search.svg', ['fullBase' => true]) ?>" alt="">
                    </div>
                </div>
                <div class="header_menu">
                    <div class="header_menu_top">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="header_bascet">
                    <div class="header_bascet_top">
                        <img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">     
                    </div>
                    <div class="header_bascket_list">
                        <p>No Items</p>
                    </div>
                </div>
            </div>
            </div>
           
    </div>
    <div class="container header_bottom">
                <div class="row">
            <div class="col-md-3">
                <?= $this->element('catalog_categories'); ?>
            </div>
            <div class="col-md-9">
                <div class="">
                    <div class="propose_links">
                        <div class="propose_links_list">
                            <ul>
                                <li><a href="<?= $this->Url->build(['controller' => 'main','action'    =>  'index']) ?>">Головна</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'about','action'   =>  'index']) ?>">Про нас</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'actions','action' =>  'index/']) ?>">Акції</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'blogs','action'   =>  'index/']) ?>">Блог</a></li>
                                <li><a href="">Відгуки</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'contacts','action'=>'index']) ?>">Контакти</a></li>
                            </ul>
                        </div>
                        <div class="propose_links_call">
                            <a  data-toggle="modal" data-target="#get_mobile">Замовити дзвінок</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
</header>
 <div class="haeder_search_popup">
     <div class="haeder_search_popup_close">
         
     </div>
     <div class="haeder_search_popup_form">
         <form action="">
             <input type="text" placeholder="Пошук">
             <label for="submit" class="header_center_submit">
                    <img src="<?= $this->Url->build('/img/search.svg', ['fullBase' => true]) ?>" alt="">
                    <input type= "submit" value="Надіслати" name="submit">
             </label>
                      <img src="<?= $this->Url->build('/img/close.svg', ['fullBase' => true]) ?>" alt="" class="close_search_form"> 

         </form>
     </div>
 </div>

 <div class="mobile_menu">
     <div class="mobile_menu_close">
         <img src="<?= $this->Url->build('/img/close.svg', ['fullBase' => true]) ?>" alt="">
     </div>
     <div class="mobile_menu_list">
         <ul>
             <li><a href="<?= $this->Url->build(['controller' => 'main','action'    =>  'index']) ?>">Головна</a></li>
             <li><a href="<?= $this->Url->build(['controller' => 'about','action'   =>  'index']) ?>">Про нас</a></li>
             <li><a href="<?= $this->Url->build(['controller' => 'actions','action' =>  'index']) ?>">Акції</a></li>
             <li><a href="<?= $this->Url->build(['controller' => 'blogs','action'   =>  'index']) ?>">Блог</a></li>
             <li><a href="">Відгуки</a></li>
             <li><a href="<?= $this->Url->build(['controller' => 'contacts','action'=>'index']) ?>">Контакти</a></li>
         </ul> 
     </div>
 </div>

 <div class="modal fade" id="get_mobile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content quick_buy_modal">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Замовити дзвінок</h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body quick_buy_form">
        <form action="" class="get_call_form">
          <p class="quick_buy_form_title">Заповніть данні і наш менеджер звяжеться з вами</p>
          <input type="text" name="user_name" placeholder="Ваше ім'я" required="true">
          <input type="text" name="user_phone" placeholder="Ваш номер телефону" required="true">
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

 <script>
     /*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

var global_url  = '<?= $baseUrl ?>';
 </script>
<main>