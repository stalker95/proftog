<div class="row">

      <div class="col-md-12">
        <div class="playlist__managment__item">
          <p class="playlist__managment__item__title">
         
            
            <?= __('Правила обміну та повернення') ?>
          </p>
     <?= $this->Form->create($rules)  ?>

 <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Title page</p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
      <?=  $this->Form->control('title_page',array('label' => false,'type'=>'text','class'=>'form-control','min'=>6));?>
    </div>
  </div>
</div>

     

 <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Description Page</p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
      <?=  $this->Form->control('description_page',array('label' => false,'type'=>'textarea','class'=>'form-control','min'=>6));?>
    </div>
  </div>
</div>   

 <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Keywords</p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
      <?=  $this->Form->control('keywords',array('label' => false,'type'=>'textarea','class'=>'form-control','min'=>6));?>
    </div>
  </div>
</div>

  <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Title Page</p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
      <?=  $this->Form->control('title',array('label' => false,'class'=>'form-control','min'=>6));?>
    </div>
  </div>
</div>

 <div class="playlist__managment--item">
  <div class="playlist__managment--item__left">
    <p>Text </p>
  </div>
  <div class="playlist__managment--item__right">
    <div class="playlist--item--sub">
      <?=  $this->Form->control('description',array('label' => false,'type'=>'textarea','class'=>'form-control','min'=>6,'id' => 'editor1','required'=>'required'));?>
    </div>
  </div>
</div>

<?=  $this->Form->submit('Зберегти ',['class'=>'btn  btn-primary save__changes__form__playlist']); ?>
     <?=   $this->Form->end() ?>
        </div>
      </div>
      <div class="col-md-6">

      </div>  
</div>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script>
    $(document).ready(function () {
       CKEDITOR.replace( 'editor1');
    });
</script>