 <section class="content white_background products_container">
  <div class="row">
   <div class="col-xs-12">
     <div class="products_container_top">
       <p class="products_container_title">Клієнти</p>
       <div class="product_container_buttons">
                <!--  <a href="<?= $this->Url->build(['controller' => 'users','action'=>'add']) ?>" class="product_container_buttons_add btn-primary">
           <i class="fa fa-plus"></i>
         </a> -->
         <a style="background: green;" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'export', '_full' => true]) ?>" class="btn btn-success">
            <i class="fa fa-download"></i>
         </a>
         <a style="background: blue;" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'followers', '_full' => true]) ?>" class="btn btn-success">
            <i class="fa fa-male"></i>
         </a>
         <div class="create__new__user">
           
           <button class="btn delete_form_checked  btn-dangeres save__changes__form__playlist" data-toggle="modal" data-target="#mediaGallery" >
                     <i class="fa fa-trash"></i>
          </button>
         </div>
         
       </div>
     </div>
     
     <div class="box">
      <div class="box-body table-responsive no-padding">
       <div class="box-header">

              
           </div>
              <table class="table table-bordered table-striped" id="example1">
                 <thead>
                <tr>
                  <th class="first-check" >
                    <label class="custom-checkbox">
                          <input type="checkbox" id="delete-all">
                          <span class="checkmark"></span>
                    </label>
                  </th>
                  <th>ID</th>
                  <th>First Nmae</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Телефон</th>
                  <th>Дата реєстрації</th>
                  <th>Тип реєстрації</th>
                  <th>Дії</th>
                </tr>
                </thead>
                <tbody>
                <?php   foreach ($users as $user): ?>
                  <tr>
                    <td class="first-check">
                       <label class="custom-checkbox">
                          <input type="checkbox" id="delete-all" value="<?= $user->id ?>" class='delete_item'>
                          <span class="checkmark"></span>
                    </label>
                    </td>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['firstname'] ?></td>
                    <td><?= $user['lastname'] ?></td>
                    <td><?= $user['mail'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['created'] ?></td>
                    <td><?php   if ($user['type_registry'] == 0): ?>Особистий кабінет <?php  endif; ?>
                      <?php   if ($user['type_registry'] == 1): ?>Підписка<?php  endif; ?>
                    </td>
                    <td class='table__flex'>
                      <?php
                        echo   $this->Html->link('<i class="fa fa-pencil"></i>', ['action' => 'edit', $user->id], ['class'=>'btn change__user','escape' => false]);
                         echo "<button class='btn  delete__user' data-toggle='modal' data-target='#mediaGallery_".$user->id."'><i class='fa fa-trash'></i></button>"; ?>
                    </td>
                    </tr>
                <?php endforeach; ?>
              </tbody>
              </table>
            </div>
             <?php
              $params = $this->Paginator->params();
              if ($params['pageCount'] > 1): ?>
                <ul class="pagination pagination-sm">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
          <?php endif; ?>
          </div>
        </div>
      </div>

<?php   foreach ($users as $user): ?>

  <div class="modal fade" id="mediaGallery_<?= $user->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="gallery-box form__inline" style="text-align: center;">
          <h2 style="text-align: center;">Ви хочете видалити користувача <?= $user->firstname ?>  <?= $user->lastname ?>?</h2>
          <button class="close_modal_form close__modal" >Ні</button>
           <?= $this->Form->create('Delete',['url'   => array(
               'controller' => 'users','action' => 'delete/'.$user->id
           )])  ?>
           <div class="delete_form_checked_inputs"> </div>
           <?=  $this->Form->submit('Так ',['class'=>'btn  btn-dangeres save__changes__form__playlist','style'=>'margin-top:0px;margin-left:auto;margin-right:auto;']); ?>
           <?=   $this->Form->end() ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>


<div class="modal fade" id="mediaGallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabels" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="gallery-box form__inline" style="text-align: center;">
          <h2 style="text-align: center;">Ви хочете видалити користувачів ?</h2>
          <button class="close_modal_form close__modal" >Ні</button>
           <?= $this->Form->create('Delete',['url'   => array(
               'controller' => 'users','action' => 'deletechecked'
           )])  ?>
           <div class="delete_form_checked_inputs"> </div>
           <?=  $this->Form->submit('Так ',['class'=>'btn  btn-dangeres save__changes__form__playlist','style'=>'margin-top:0px;margin-left:auto;margin-right:auto;']); ?>
           <?=   $this->Form->end() ?>
        </div>
      </div>
    </div>
  </div>
</div>
    </section>
  <script>

<?php $this->Html->script('admin/jquery.dataTables.min.js', ['block' => 'scriptBottom']); ?>
<?php $this->Html->script('admin/dataTables.bootstrap.min.js', ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->scriptStart(['block' => true]); ?>
 
<?php echo $this->Html->scriptEnd(); ?>
</script>