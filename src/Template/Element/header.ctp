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
                    <i class="fa fa-exchange"></i>
                    м.Львів вул Зелена 15
                </a>
                <a href="tel:093 000 000">
                    <i class="fa fa-exchange"></i>
                    093 000 000 
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
                        Список бажань (<?= count($_SESSION['wishlist']); ?>) 
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
                            <div class="custom-select" >
                                <select name="category">
                                    <option value="0">Всі категорії</option>
                                    <?php foreach ($categories as $key => $value): if ($value['parent_id']): ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    
                                <?php endif; endforeach; ?>
                                </select>
                            </div>
                            <input type="text" class="header_center_text outline-none" placeholder="Пошук продуктів ">
                            <label for="submit" class="header_center_submit">
                                <img src="<?= $this->Url->build('/img/search.svg', ['fullBase' => true]) ?>" alt="">
                                <input type= "submit" value="Надіслати" name="submit">
                            </label>
                        </form>
                    </div>
                    <div class="header_center_right hide_mobile">
                        <a href="" class="header_center-link">
                            <div class="header_center-link_circle">
                                <img src="<?= $this->Url->build('/img/back.svg', ['fullBase' => true]) ?>" alt="">
                            </div>
                            <div class="header_center-link-description">
                                <p class="header_center-link-title">Корзина</p>
                                <p class="header_center-link-subtitle">1 товар</p>
                            </div>
                        </a>
                        <a href="" class="header_center-link">
                            <div class="header_center-link_circle">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="header_center-link-description">
                                <p class="header_center-link-title">Кабінет</p>
                                <p class="header_center-link-subtitle">Андрвій</p>
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
                <div class="">
                    <div class="propose_links">
                        <div class="propose_links_list">
                            <ul>
                                <li><a href="<?= $this->Url->build(['controller' => 'main','action'    =>  'index']) ?>">Головна</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'about','action'   =>  'index']) ?>">Про нас</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'actions','action' =>  'index']) ?>">Акції</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'blogs','action'   =>  'index']) ?>">Блог</a></li>
                                <li><a href="">Відгуки</a></li>
                                <li><a href="<?= $this->Url->build(['controller' => 'contacts','action'=>'index']) ?>">Контакти</a></li>
                            </ul>
                        </div>
                        <div class="propose_links_call">
                            <a href="/">Замовити дзвінок</a>
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
<main>