<section class="sidebar">
    <!-- Sidebar user panel -->
   <!-- <div class="user-panel">
        <div class="pull-left image">
            <?php echo $this->Html->image($employee->getAvatar(), ['class' => 'img-circle', 'alt' => __('User Image')]); ?>
        </div>
        <div class="pull-left info">
            <p><?php echo trim($employee->getName()); ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div> -->

    <ul class="sidebar-menu" data-widget="tree">
       <!-- <li class="header">MAIN NAVIGATION</li> -->

        <li class="<?= $nav_['dashboard'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'dashboard', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-pencil"></i> <span><?php echo __('Дошка'); ?></span>
            </a>
        </li>  
<?php   if ($user->is_abs()): ?>
        <li class="<?= $nav_['users'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Користувачі'); ?></span>
            </a>
        </li> 

        <li class="<?= $nav_['users'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'quick-orders', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Швидкі замовлення'); ?></span>
            </a>
        </li> 
         
<?php endif; ?>
      <li class="<?= $nav_['products'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Товари'); ?></span>
            </a>
        </li> 
<?php   if ($user->is_abs()): ?>
         
        <li class="<?= $nav_['category'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'category', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Категорії'); ?></span>
            </a>
        </li> 

        <li class="<?= $nav_['actions'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'actions', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Акції'); ?></span>
            </a>
        </li> 

        <li class="<?= $nav_['proposes'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'proposes', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Пропозиції'); ?></span>
            </a>
        </li> 
                <li class="<?= $nav_['options'] ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Опції</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li ><a href="<?php echo $this->Url->build(['controller' => 'options-items', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-circle-o"></i>Опції</a>
            </li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'options', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-circle-o"></i> Групи опцій</a>
            </li>

          </ul>
        </li>

        <li class="<?= $nav_['producers'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'producers', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Виробники'); ?></span>
            </a>
        </li>

        <li class="<?= $nav_['content'] ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Блог</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
                <a href="<?php echo $this->Url->build(['controller' => 'BlogCategories', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>"><i class="fa fa-circle-o"></i> Категорії блога</a>
            </li>
            <li class="<?= $nav_['blogs'] ? 'active' : '' ?>">
              <a href="<?php echo $this->Url->build(['controller' => 'blogs', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Блог'); ?></span>
              </a>
             </li> 
           
          </ul>
        </li>



        <li class="<?= $nav_['attributes'] ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Атрибути</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li ><a href="<?php echo $this->Url->build(['controller' => 'attributes-items', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-circle-o"></i> Атрибути</a>
            </li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'attributes', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-circle-o"></i> Групи атрибутів</a>
            </li>

          </ul>
        </li>

          
        <li class="<?= $nav_['content'] ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>СТорінки</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="<?php echo $this->Url->build(['controller' => 'rules', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>"><i class="fa fa-circle-o"></i> Правила обміну та повернення  v1</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'delivery-page', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>"><i class="fa fa-circle-o"></i> Доставка</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'contacts', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>"><i class="fa fa-circle-o"></i> Контакти</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'aboutus', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>"><i class="fa fa-circle-o"></i> Про нас</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'payments', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>"><i class="fa fa-circle-o"></i> Оплата</a></li>
            <li><a href="<?php echo $this->Url->build(['controller' => 'publics', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>"><i class="fa fa-circle-o"></i>Публічна офкрта</a></li>
          </ul>
        </li>

        <li class="<?= $nav_['seo'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'seo', 'action' => 'edit', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Seo'); ?></span>
            </a>
        </li> 

        

     <li class="<?= $nav_['content'] ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Налаштування</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li >
                <a href="<?php echo $this->Url->build(['controller' => 'settings', 'action' => 'edit', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>"><i class="fa fa-circle-o"></i>Загальні налаштування </a>
            </li>
             <li >
                <a href="<?php echo $this->Url->build(['controller' => 'managers', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?> "><i class="fa fa-circle-o"></i>Менеджери</a>
            </li>
            <li class="<?= $nav_['currency'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'currency', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Валюти'); ?></span>
            </a>
        </li> 
            
          </ul>
        </li>


         <?php endif; ?>

          <li class="absolute_link" >
            <a href="<?php echo $baseUrl; ?>" target="_blanck">
                <i class="fa fa-globe"></i> <span>Відвідати сайт</span>
            </a>
        </li>
      
        
    </ul>
</section>