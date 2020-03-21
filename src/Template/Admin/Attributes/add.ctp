    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-6">
      	<h1 class="blog__title">Додавання групи атрибутів</h1>
        <div class="playlist__managment__item">
    <?= $this->Form->create($attribute); ?>
       <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Назва</p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
    <?=  $this->Form->control('name',array('label' => 'First Name','class'=>'form-control','required'=>'required'));?>

    </div>
  </div>
</div>

<?=  $this->Form->submit('Додати',['class'=>'btn  btn-primary save__changes__form']); ?>
     <?=   $this->Form->end() ?>
        </div>
      </div>
      <div class="col-md-6">

      </div>  
</div>


</section>
 <script>

<?php $this->Html->script('admin/jquery.dataTables.min.js', ['block' => 'scriptBottom']); ?>
<?php $this->Html->script('admin/dataTables.bootstrap.min.js', ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->scriptStart(['block' => true]); ?>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});

   $("#add_new_variation").click(function() {
      $(".variation_list").append("<div style='display: flex;' class='delete_option_block'><button class='delete_option delete_option_button'>Видалити</button><input type='text' name='attribute_item[]'></div>")
   });

   $(".delete_option").click(function() {
       $(this).parent().remove();
   });

<?php echo $this->Html->scriptEnd(); ?>
</script>