       <div class="attributes_list attributes_list_parent" style="display: none;">
                          <?php  foreach ($attributes as $key => $value): ?>
                            <div class="attributes_list_item">
                              <p class="attributes_list_item_title"><?= $value['name']; ?></p>
                              <div class="attributes_list_item_list">
                                <?php foreach ($value['attributes_items'] as $key => $item): ?>
                                  <p class="attributes_list_item_list_item choose_attribute" data-attribute="<?= $item['id'] ?>" data-name="<?= $item['name'] ?>"> <?= $item['name']; ?></p>
                                <?php endforeach; ?>
                              </div>
                            </div>
                          <?php   endforeach; ?>
                        </div>
    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="blog__title">Редагування товара</h1>
        <div class="playlist__managment__item">
            <?= $this->Form->create($product,['type' => 'file']); ?>

             <div class="products_add_tabs">
              <div class="products_add_tabs_item active_add_tabs_item">
                <p>Загальна інформація</p>
              </div>
              <div class="products_add_tabs_item">
                <p>Атрибути</p>
              </div>
              <div class="products_add_tabs_item">
                <p>Опції</p>
              </div>
              <div class="products_add_tabs_item">
                <p>Виробник</p>
              </div>
              <div class="products_add_tabs_item">
                <p>Фото та відео</p>
              </div>
            </div>
          <div class="products_container">
            <div class="product_container_item" style="display: block;">
 <div class="playlist__managment--item">
                  <div class="playlist__managment--item__left">
                    <p>Назва</p>
                  </div>
                  <div class="playlist__managment--item__right">
                    <div class="playlist--item--sub">
                        <?=  $this->Form->control('title',array('label' => 'First Name','type'=>'text','class'=>'form-control','required'=>'required'));?>
                    </div>
                  </div>
                </div>
        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Slug</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('slug',array('label' => 'First Name','type'=>'text','class'=>'form-control','required'=>'required'));?>    
              </div>
            </div>
        </div>
        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Ціна</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('price',array('label' => 'First Name','type'=>'number','class'=>'form-control','required'=>'required'));?>    
              </div>
            </div>
        </div>
                <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Ціна нова</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('price_new',array('label' => 'First Name','type'=>'number','class'=>'form-control'));?>    
              </div>
            </div>
        </div>
        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Хіт продажу</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <input type="radio" name="hit" style="text-align: left;width: auto;" <?php if($product->hit): ?> checked <?php endif; ?>>   
              </div>
            </div>
        </div>
       <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Валюта</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">

                  <select name="currency_id" id="" class="form-control">
                    <?php   if ($product->currency_id == 1){ ?>
                      <option value="1">Гривні</option>
                    <option value="2">Євро</option>
                    <option value="3">Доллари</option>
                    <?php   } ?>

                     <?php   if ($product->currency_id == 2){ ?>
                      
                    <option value="2">Євро</option>
                    <option value="1">Гривні</option>
                    <option value="3">Доллари</option>
                    <?php   } ?>

                     <?php   if ($product->currency_id == 3){ ?>
                      <option value="3">Доллари</option>
                      <option value="1">Гривні</option>
                    <option value="2">Євро</option>
                    
                    <?php   } ?>
                    
                  </select>
              </div>
            </div>
        </div>

       
         
         <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Категорія</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('category_id',array('label' => 'First Name','type'=>'select','min'=>0,'class'=>'form-control', 'options'=>$category_id, 'required'=>'required','id'=>'choose_category'));?>    
              </div>
            </div>
        </div>
       

        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Кількість</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('amount',array('label' => 'First Name','type'=>'text','class'=>'form-control','required'=>'required'));?>    
              </div>
            </div>
        </div>
        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Код товару</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('cod',array('label' => 'Кількість','type'=>'text','class'=>'form-control','required'=>'required'));?>    
              </div>
            </div>
        </div>
        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Заголовок сторінки</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('title_page',array('label' => 'First Name','type'=>'text','class'=>'form-control','required'=>'required'));?>    
              </div>
            </div>
        </div>

        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Ключові слова</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('keywords',array('label' => 'First Name','type'=>'text','class'=>'form-control','required'=>'required'));?>    
              </div>
            </div>
        </div>
        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Опис</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('page_description',array('label' => 'First Name','type'=>'textarea','class'=>'form-control','required'=>'required'));?>    
              </div>
            </div>
        </div>

        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Опис товару</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                <?=  $this->Form->control('description',array('label' => 'First Name','type'=>'textarea','class'=>'form-control','id' => 'editor1','required'=>'required'));?>    
              </div>
        </div>
        </div>
            </div>
            <div class="product_container_item">
                           <div class="attributes_products">
                <p class="attributes_products_title">Атрибути</p>
                <table class="attributes_table">
                  <thead>
                    <th>Атрибут</th>
                    <th>Значення</th>
                    <th></th>
                  </thead>
                  <tbody>
                    <?php foreach ($attributes_products as $key => $value): ?>
                      <tr>
                        <td style="width: 30%;position: relative;">
                        <input type="text" class="search_attribute" name="attribute" autocomplete="off" value="<?= $value['attributes_item']['name'] ?>">
                        <input type="text" class="search_attribute_id" name="attributes[]" style="display: none;" value="<?= $value['attribute_id'] ?>">
                        </td>
                        <td>
                          <input type="text" name="attributes_values[]" value="<?= $value['value']  ?>"></td>
                          <td style="text-align: center;">
                            <button class="delete_new_attribute btn-danger"><i class="fa fa-minus"></i></button>
                          </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <div class="add_new_attribute_container">
                <button class="add_new_attribute btn-primary" type="button">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
              </div>
            </div>

             <div class="product_container_item">
                           <div class="product_options">
                <div class="product_options_left">
                  <div class="selected_options_products">
                    <?php foreach ($option_group as $key => $value): ?>
                      <?php if (!empty($value)) { ?>
                        <div class="selected_options_products_item ">
                      <button type="button" class="selected_options_delete_option"><i class="fa fa-minus"></i></button>
                      <p><?= $key ?></p>
                    </div>
                  <?php } ?>
                   <?php endforeach; ?>
                    
                  </div>
                  <div class="selected_options_products_add">
                    <input type="text" id="selected_option" placeholder="Опція">
                    <div class="selected_options_products_list" >
                      <?php  foreach ($first_options as $key => $value): ?>
                        <p class="choosed_option" data-option="<?= $value['id'] ?>" data-name="<?= $value['name'] ?>"><?=  $value['name'] ?></p>
                      <?php   endforeach ?>
                     <p>  </p>
                    </div>
                  </div>
                </div>
                <div class="product_options_right">
                  <div class="product_options_right_list">

                   <?php foreach ($option_group as $key_parent => $value): ?>
                    <?php
                    if (!isset($value[0]['option_id'])) {
                      continue;
                    }
                     $id_option = $value[0]['option_id']; ?>

                      <div class="product_options_right_list_item" style="display: none;">
                        <p><?= $key_parent ?></p>
                        <table>
                          <thead>
                            <tr>
                              <th>Значення опції</th>
                              <th>Ціна</th>
                              <th>Дії</th>
                            </tr></thead>
                            <tbody>
                             <?php foreach ($value as $key => $item): ?>
                              <tr>
                                <td>
                                  <select name="options_item[]" id="" class="choose_option">
                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <? ?>
                                    
                                  </select></td>
                                  <td>
                                    <?php foreach ($item['products_options'] as $key => $item_value): ?>
                                      <?php if ($item_value['product_id'] == $id) { ?>
                                    <input type="number" name="amount_option[]" value="<?= $item_value['value'] ?>">

                                      <?php } ?>

                                    <?php endforeach; ?>
                                  </td>
                                  <td style="text-align: center;">
                                    <button class="delete_item_option" type="button">
                                      <i class="fa fa-minus"></i>
                                    </button>
                                  </td>
                                </tr>
                                                      <?php endforeach; ?>
                              </tbody>
                            </table>
                            <div style="text-align: right;">
                              <button class="add_new_edit" type="button" data-option="<?= $id_option; ?>"><i class="fa fa-plus"></i></button>
                            </div>
                          </div>
                      
                   <?php endforeach; ?>

                  </div>
                </div>
              </div>
            </div>

             <div class="product_container_item">
                      <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Виробник</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub">
                  <?=  $this->Form->control('producer_id',array('label' => 'Категорія','type'=>'select','min'=>0,'class'=>'form-control', 'options'=>$producer_id, 'required'=>'required','empty'=>'Виберіть виробника','id'=>'choose_category'));?>    
              </div>
            </div>
        </div>
            </div>

             <div class="product_container_item">
        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Головне зображення</p>
            </div>
            <div class="playlist__managment--item__right">
              <div class="playlist--item--sub" style="display: block;">
                  <?=  $this->Form->control('image',array('label' => 'First Name','type'=>'file','class'=>'input-file-trigger form-control', 'style'=>'font-size: 1em;padding:0px;width:200px;','value'=>$product->image,'id'=>'fileimgMeal'));?>    
                  <div id="fotosViewMeal" style="position: relative;width: 33%;text-align: center;" class="image_gallery_preview imgNew">
                    <img src="<?= $this->Url->build('/products/'.$product->image.'', ['fullBase' => true]) ?>" alt="" style="max-width: 500px;">
                  </div>  
              </div>
             
            </div>
        </div>
        <div class="playlist__managment--item">
            <div class="playlist__managment--item__left">
              <p>Галерея зображень</p>
            </div>
            <div class="playlist__managment--item__right">
                    <table class="products_add_table">
                      <thead>
                        <th>Зображення</th>
                        <th>Позиція</th>
                        <th>Alt</th>
                        <th>Дії</th>
                      </thead>
                      <tbody>
                        <?php foreach ($products_gallery as $key => $value): ?>
                          <td>
                            <div class="input-file-container-item">
                               <?=  $this->Form->control('image_gallery[]',array('type'=>'file','label' =>'false','id'=>'file_'.$key.'','class'=>'upload_gallery_item form-control','style' => 'display:none;'));?> 
                                <label tabindex="0" for="file_<?= $key ?>" class="input-file-trigger"><i class="fa fa-close"> </i></label>
                                 <div class="image_gallery_preview">
                                  <?php   if(isset($products_gallery[$key]['name'])): ?>
                                    <div class="thumbnail imgNew" style="width: 100%;text-align:center;"> 
                                     <div id="img-list">
                                      <img src="<?= $this->Url->build('/products_gallery/'.$products_gallery[$key]['name'].'', ['fullBase' => true]) ?>" alt="" style="width: 100%;height:238px;object-fit:cover;border-radius:0px;">
                                     </div>
                                     <div class="deleteImg"> </div>
                                    </div>
                                  <?php endif; ?>
                                 </div>
                           </div>
                          </td>
                          <td class="products_add_table_padding">
                            <input type="number" name="position[]" value="<?= $value['position'] ?>">
                          </td>
                          <td class="products_add_table_padding">
                            <input type="text" name="alts[]" value="<?= $value['alt'] ?>">
                          </td>
                           <td class="products_add_table_padding">
                            <button type="button" class="delete_row btn-danger"><i class="fa fa-minus"></i></button>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        
                      </tbody>
                    </table>
                    <div class="add_new_attribute_container">
                   <button class="add_row_for_gallery btn-primary" type="button"><i class="fa fa-plus"></i></button>
                      
                    </div>
            
            </div>
        </div>
     </div>

               
      <?=  $this->Form->submit('Зберегти',['class'=>'btn  btn-primary save__changes__form']); ?>
        <?=   $this->Form->end() ?>
       </div>
    </div>
</div>


</section>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script>

  var option_url = '<?= $this->Url->build(['controller' => 'options', 'action' => 'get-list-options', '_full' => true]) ?>';
  var attributes_url = '<?= $this->Url->build(['controller' => 'attributes', 'action' => 'get-list-attributes', '_full' => true]) ?>';



    $(document).ready(function () {
       CKEDITOR.replace( 'editor1');
    });
</script>
<?= $this->Html->script('admin/options.js?v=123'); ?>
<?= $this->Html->script('admin/attributes.js?v=123'); ?>
<script>
$(document).ready(function() {
  
$(".products_add_tabs_item").click(function() {
  $(".products_add_tabs_item").removeClass('active_add_tabs_item');
  var index = $(this).index();

  $(".product_container_item").css("display","none");
  $(".product_container_item").eq(index).css("display", "block");
 $(this).addClass("active_add_tabs_item");
});

});
$(document).ready(function() {

var count = $(".products_add_table tbody tr").length;
$(".add_row_for_gallery").click(function() {
 
 count++;
 
  $(".products_add_table tbody").append('<tr>'+
                          '<td>'+
                            '<div class="input-file-container-item">'+
                                '<input type="file" name="image_gallery[]" id="file_first'+count+'" class="upload_gallery_item form-control" style="display:none;">'+
                                '<label tabindex="0" for="file_first'+count+'" class="input-file-trigger"><i class="fa fa-close"> </i></label>'+
                                '<div class="image_gallery_preview">  </div>'+
                           '</div>'+
                          '</td>'+
                          '<td class="products_add_table_padding">'+
                            '<input type="number" name="position[]" value="'+count+'">'+
                          '</td>'+
                          '<td class="products_add_table_padding">'+
                            '<input type="text" name="alts[]">'+
                          '</td>'+
                           '<td class="products_add_table_padding">'+
                            '<button type="button" class="delete_row btn-danger"><i class="fa fa-minus"></i></button>'+
                          '</td>'+
                        '</tr>');
});

$('body').on('click', ".delete_row", function() {
   $(this).parent().parent().remove();
});
});
$(document).ready(function() {

 $("#selected_option").click(function() {
   $(".selected_options_products_list").css("display", "block");
 });

$(".product_options_right_list .product_options_right_list_item:last-child").css("display","block");
});

        $(document).ready(function () {
        initOptionImg();
           });
    function initOptionImg() {


// for add new image in color
        $("#blockAddImgMeal").off();
        $("#blockAddImgMeal").on("click", function () {
            $("#fileimgMeal").click();
        });

        $("#fileimgMeal").off();
        $("#fileimgMeal").change(function () {
            readURL($(this), this);
        });

$('body').on('change', ".upload_gallery_item", function() {
            readURL($(this), this);
        });

        $('.deleteImg').off();
        $('.deleteImg').on('click', function () {
            inp = $(this).parent().parent().find("#fileimgMeal");
            inp.replaceWith(inp.val('').clone(true));
            $(this).parent().parent().find('.imgNew').remove();
            $("#blockAddImgMeal").show();
            $("#imgMainProfile").attr('src', $("#imgMainProfile").attr('data-src'));
        });

    }

    function readURL(element, input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                var dataURL = e.target.result;
                var mimeType = dataURL.split(",")[0].split(":")[1].split(";")[0];

                if ((mimeType != 'image/jpeg') && (mimeType != 'image/jpg') && (mimeType != 'image/png')) {
                    // not support format
                    inp = $("#fileimgMeal");
                    inp.replaceWith(inp.val('').clone(true));
                    alert("Type file not suported \nOnly PNG or JPEG/JPG");
                } else { //suport format
                    dataView = '<div class="thumbnail imgNew" id="imgNew" style="width: 100%;text-align:center;">';
                    dataView += '<div id="img-list">';
                    dataView += '<img id="imgMain" class="img-circle" src="' + e.target.result + '" style="width: 100%;height:238px;object-fit:cover;border-radius:0px;"/>';
                    dataView += '<div class="deleteImgBack" style="display:none;"></div>';
                    dataView += '<div class="deleteImg" id="delView"></div>';
                    dataView += '</div>';
                    dataView += '</div>';
                    $(element).parent().parent().find('.image_gallery_preview').html(dataView);
                    $("#blockAddImgMeal").hide();
                    $(this).parent().find('.image_gallery_preview').attr('src', e.target.result);
                   // $("#imgMainProfile").attr('src', e.target.result);

                    //main_img = e.target.result;
                    initOptionImg();

                }
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),  
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");
      
button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
        fileInput.focus();  
    }  
});
button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
});  
fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
});  



</script>