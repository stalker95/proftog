 <section class="content white_background products_container">
  <div class="row">
   <div class="col-xs-12">
     <div class="products_container_top">
       <p class="products_container_title">Відгуки</p>
       <div class="product_container_buttons">
         
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
                  <th class="first-check"> <label class="custom-checkbox">
                          <input type="checkbox" id="delete-all">
                          <span class="checkmark"></span>
                    </label></th>
                  <th>Товар</th>
                  <th>Автор відгуку</th>
                  <th>Відгук</th>
                  <th>Оцінка</th>
                  <th>Дата</th>
                  <th>Стутус</th>
                  
                  <th>Дії</th>
                </tr>
                </thead>
                <tbody>
                <?php   foreach ($rewievs as $item): ?>
                  <tr>
                    <td class="first-check"> <label class="custom-checkbox">
                          <input type="checkbox" id="delete-all" value="<?= $item->id ?>" class='delete_item'>
                          <span class="checkmark"></span>
                    </label></td>
                    <td><?= $item->product->title ?></td>
                    <td><?= $item->user_name ?></td>
                    <td><?= $item->rewiev_text ?></td>
                    <td><?php for ($i=0; $i < $item->rating ; $i++) { 
                      echo "<i class='fa fa-star' style='color: yellow;'>  </i>" ;
                    } ?>
                      <?php for ($i=0; $i < 5 - $item->rating; $i++) { 
                      echo "<i class='fa fa-star' style='color: grey;'>  </i>" ;
                    } ?>
                    </td>
                    <td><?= $item->created ?></td>
                    <td>
                      <?php   if ($item->status == 0) { 
                        echo "<i class=єfas fa-circleє></i> Новий";
                       } elseif ($item->status == 1) {
                        echo "<i class=єfas fa-circleє></i> Відхилено"; 
                       } elseif ($item->status == 2) {
                        echo "<i class=єfas fa-circleє></i> Підтверджено"; 
                      }
                      ?>
                    </td>
                    <td>
                      <select name="change_status" data-order="<?= $item->id ?>" class="change_status">
                        <option value="0" <?php   if($item->status == 0) { echo "selected"; } ?>>Новий</option>
                        <option value="1" <?php   if($item->status == 1) { echo "selected"; } ?>>Відхилено</option>
                        <option value="2" <?php   if($item->status == 2) { echo "selected"; } ?>>Підтверджено</option>
                      </select>
                     <!-- <?php if ($quickOrder->status == 0): ?>
                        <button class="btn btn-success confirm_status" data-record="<?= $quickOrder->id ?>">Підтвердити</button>
                      <?php endif; ?>
                       <?php if ($quickOrder->status != 0): ?>
                        Підтверджено
                       <?php endif; ?> -->
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
                    <?= $this->Paginator->first('<< ') ?>
                    <?= $this->Paginator->prev('< ' ) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(' >') ?>
                <?= $this->Paginator->last(' >>') ?>
                </ul>
      <?php endif; ?>
          </div>
        </div>
      </div>

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
          <h2 style="text-align: center;">Ви хочете видалити відгуки ?</h2>
          <button class="close_modal_form close__modal" >Ні</button>
           <?= $this->Form->create('Delete',['url'   => array(
               'controller' => 'rewiev','action' => 'deletechecked'
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

   $(".change_status").change(function() {
      
      var id_order = $(this).attr('data-order');
      var status = $(this).val();

      $.ajax({
        url: '<?= $this->Url->build(['controller' => 'rewiev', 'action' => 'change-order', '_full' => true]) ?>',
        method: 'POST',
        data: { "id_order": id_order, status: status},
        success: function(data){ 
          
        }
    });

   });

<?php echo $this->Html->scriptEnd(); ?>
</script>