<div class="row">

      <div class="col-md-6">
        <div class="playlist__managment__item">
          <p class="playlist__managment__item__title">
         
            
            <?= __('Редагування менеджера') ?>
          </p>
     <?= $this->Form->create($_user)  ?>
       <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Ім'я </p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
      <?=  $this->Form->control('firstname',array('label' => false,'class'=>'form-control','min'=>6));?>
    </div>
  </div>
</div>

 <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Прізвище</p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
      <?=  $this->Form->control('lastname',array('label' => false,'class'=>'form-control','min'=>6));?>
    </div>
  </div>
</div>   

<div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Email </p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
   <?=  $this->Form->control('mail',['type'=>'email','label' => 'Email', 'class'=>'form-control']); ?>
    </div>
  </div>
</div>  

<div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Статус </p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
      <?php   if ($_user->status == 1):  ?>
        <select name="active" id="" class="form-control">
          <option value="1">Активний</option>
          <option value="0">Не активний</option>
        </select>
      <?php   endif; ?>
      <?php   if ($_user->status == 0):  ?>
        <select name="active" id="">
          <option value="0">Не активний</option>
          <option value="1">Активний</option>
        </select>
      <?php   endif; ?>
    </div>
  </div>
</div>  


<?=  $this->Form->submit('Save ',['class'=>'btn  btn-primary save__changes__form__playlist']); ?>
     <?=   $this->Form->end() ?>
        </div>
      </div>
      <div class="col-md-6">

      </div>  
</div>