<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<section class="content">
    <div class="row">
      <div class="col-md-6">
         <h1 class="blog__title">Редагування категорії</h1>
         <div class="playlist__managment__item">
            <?= $this->Form->create($optionsItem, ['type' => 'file']); ?>
                    <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Ім'я </p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
    <?=  $this->Form->control('name',array('label' => 'First Name','type'=>'text','class'=>'form-control','required'=>'required'));?>

    </div>
  </div>
</div>

            <div class="playlist__managment--item">
              <div class="playlist__managment--item__left">
                <p>Батьківська група </p>
              </div>
              <div class="playlist__managment--item__right">
                <div class="playlist--item--sub">
                  <select name="option_id" id="" class="form-control">
                    <option value="<?= $parent_option->id  ?>"><?= $parent_option->name ?></option>
                    <?php  foreach ($options as $key => $value): ?>
                      <option value="<?= $value['id'] ?>"> <?= $value['name']; ?> </option>
                    <?php  endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

            <?=  $this->Form->submit('Зберегти зміни',['class'=>'btn  btn-primary save__changes__form']); ?>
            <?=  $this->Form->end() ?>
        </div>
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

<?php echo $this->Html->scriptEnd(); ?>
</script>