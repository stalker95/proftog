<section class="content">
    <div class="row">
      <div class="col-md-6">
         <h1 class="blog__title">Редагування атрибута</h1>
         <div class="playlist__managment__item">
            <?= $this->Form->create($attributesItem); ?>
              <div class="playlist__managment--item">
                  <div class="playlist__managment--item__left">
                   <p>Ім'я</p>
                  </div>
                  <div class="playlist__managment--item__right">
                    <div class="playlist--item--sub">
                        <?=  $this->Form->control('name',array('label' => 'First Name','type'=>'text','class'=>'form-control','required'=>'required'));?>
                    </div>
                  </div>
              </div>
              <div class="playlist__managment--item">
                  <div class="playlist__managment--item__left">
                   <p>Група атрибутів</p>
                  </div>
                  <div class="playlist__managment--item__right">
                    <div class="playlist--item--sub">
                        <?=  $this->Form->control('parent_id',array('label' => 'First Name','class'=>'form-control','options'=>$parent_id));?>
                    </div>
                  </div>
              </div>
            
            <?=  $this->Form->submit('Зберегти зміни',['class'=>'btn  btn-primary save__changes__form']); ?>
            <?=  $this->Form->end() ?>
        </div>
      </div>
</div>
</section>

