<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<section class="content">
    <div class="row">
      <div class="col-md-6">
         <h1 class="blog__title">Налаштування валют</h1>
         <div class="playlist__managment__item">
            <?= $this->Form->create($currency, ['type' => 'file','action'=>'index']); ?>

          <div class="playlist__managment--item">
              <div class="playlist__managment--item__left">
              </div>
          <div class="playlist__managment--item__right">
            <div class="playlist--item--sub" style="display: block;">
              <?php if ($currency->type == 1 ){  ?>
                <div style="display: flex;width:120px;align-items: center;justify-content: space-between;">Авто
                  <input type="radio" name="type" style="width: auto;" checked value="1" class="change_currency">
                </div>
                 <div style="display: flex;width:120px;align-items: center;justify-content: space-between;margin-bottom: 10px;" >Власний
                  <input type="radio" name="type" style="width: auto;"  value="2" class="change_currency">
                </div>
              <?php } else { ?>
                <div style="display: flex;width:120px;align-items: center;justify-content: space-between;">Авто
                  <input type="radio" name="type" style="width: auto;"  value="1" class="change_currency">
                </div>
                 <div style="display: flex;width:120px;align-items: center;justify-content: space-between;margin-bottom: 10px;" >Власний
                  <input type="radio" name="type" style="width: auto;" checked value="2" class="change_currency">
                </div>
              <?php } ?>
                  
                </div>
                <?php if($currency->type == 2) { ?>
                <div style="display: flex;align-items: center;justify-content: space-between;" ><p style="width:120px;margin: 0px;">Власний курс євро</p>
                   <?=  $this->Form->control('value',array('label'=>false,'class'=>'input_currency form-control','required'=>'required','style'=>'width: auto;'));?>
                </div>
                 <div style="display: flex;align-items: center;justify-content: space-between;" ><p style="width:120px;margin: 0px;">Власний курс доллар</p>
                   <?=  $this->Form->control('value_dollar',array('label'=>false,'class'=>'input_currency form-control','required'=>'required','style'=>'width: auto;'));?>
                </div>
              <?php } else { ?>
                <div style="display: flex;align-items: center;justify-content: space-between;" ><p style="width:120px;margin: 0px;">Власний курс євро</p>
                   <?=  $this->Form->control('value',array('label'=>false,'class'=>'input_currency form-control','required'=>'required','style'=>'width: auto;','disabled'=>'disabled'));?>
                </div>
                 <div style="display: flex;align-items: center;justify-content: space-between;" ><p style="width:120px;margin: 0px;">Власний курс доллар</p>
                   <?=  $this->Form->control('value_dollar',array('label'=>false,'class'=>'input_currency form-control','required'=>'required','style'=>'width: auto;','disabled'=>'disabled'));?>
                </div>
            <?php } ?>
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

    $(".change_currency").change(function() {
       
       if ($(this).val() == 1) {
          $(".input_currency").attr('disabled', 'disabled');
       } else {
         $(".input_currency").removeAttr('disabled');
       }

    });
});

<?php echo $this->Html->scriptEnd(); ?>
</script>