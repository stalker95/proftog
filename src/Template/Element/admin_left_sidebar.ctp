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

        <li class="<?= $nav_['users'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'users', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Користувачі'); ?></span>
            </a>
        </li> 

      <li class="<?= $nav_['products'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Товари'); ?></span>
            </a>
        </li> 
         
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

        <li class="<?= $nav_['options'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'options', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Опції'); ?></span>
            </a>
        </li> 

        <li class="<?= $nav_['producers'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'producers', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Виробники'); ?></span>
            </a>
        </li>

        <li class="<?= $nav_['blog_categories'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'BlogCategories', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Категорії Блога'); ?></span>
            </a>
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



          <li class="<?= $nav_['blogs'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'blogs', 'action' => 'index', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-list-ul"></i> <span><?php echo __('Блог'); ?></span>
            </a>
        </li> 

        <li class="<?= $nav_['content'] ? 'active' : '' ?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Контент</span>
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
       
     
        
             <li class="<?= $nav_['dashboard'] ? 'active' : '' ?>">
            <a href="<?php echo $this->Url->build(['controller' => 'settings', 'action' => 'edit', '_full' => true, 'prefix' => 'admin', 'plugin' => false]); ?>">
                <i class="fa fa-play"></i> <span><?php echo __('Налаштування'); ?></span>
            </a>
        </li> 
         
      
        
    </ul>
</section>