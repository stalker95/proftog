    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-6">
        <h1 class="blog__title">Редагування Оції</h1>
        <div class="playlist__managment__item">
    <?= $this->Form->create($option); ?>
       <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Назва</p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
    <?=  $this->Form->control('name',array('label' => 'First Name','type'=>'text','class'=>'form-control','required'=>'required'));?>

    </div>
  </div>
</div>

       <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Порядок</p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
    <?=  $this->Form->control('position',array('label' => 'First Name','type'=>'number','min'=>'1','class'=>'form-control','required'=>'required'));?>

    </div>
  </div>
</div>

       <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Варіації</p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub" style="display: block;">
      <div class="variation_list">
        <?php foreach ($options_items as $key => $value): ?>
          <div style='display: flex;' class='delete_option_block'><button class='delete_option delete_option_button'>Видалити</button><input type='text' name='option_item[]' value="<?= $value['name'] ?>"></div>
       <?php endforeach; ?>
      </div>
    <button type="button" id="add_new_variation">
      Додати
    </button>

    </div>
  </div>
</div>

<?=  $this->Form->submit('Зберегти',['class'=>'btn  btn-primary save__changes__form']); ?>
     <?=   $this->Form->end() ?>
        </div>
      </div>
      <div class="col-md-6">

      </div>  
</div>


</section>

  <script>

<?php echo $this->Html->scriptStart(['block' => true]); ?>
   

   $("#add_new_variation").click(function() {
      $(".variation_list").append("<div style='display: flex;' class='delete_option_block'><button class='delete_option delete_option_button'>Видалити</button><input type='text' name='option_item[]'></div>")
   });

   $(".delete_option").click(function() {
       $(this).parent()/remove();
   });

<?php echo $this->Html->scriptEnd(); ?>
</script>