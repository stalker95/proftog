<div class="filter_container">
	<div class="filter_container_title">
		<p>Фільтрувати за ціною</p>
	</div>
	<div class="filter_range_price">
		<div class="filter_range_container">
			<div class="slider-wrap">
    		<div id="slider"></div>
      			<div class="values">
        			<input type="text" name="start_price" class="sliderValue" data-index="0" value="<?= $min_price ?>" />
        			<input type="text" name="end_price" class="sliderValue" data-index="1" value="<?= $max_price ?>" />
    			</div>
 		 </div>
 		 <div class="filter_button">
 		 	<button class="button_filter">Фільтрувати</button>
 		 </div>
		</div>
		
 		 <div class="filter_elements_items">
 		 	<?php 	foreach ($attributes_to_view as $key => $value) :?>
 		 		<?php if (!empty($value)): ?>
 		 		<div class="filter_elements_items_item">
 		 			<p class="filter_elements_items_item_title"><?= $key ?></p>
 		 			<?php 	foreach ($value as $keys => $item):  ?>
                    <input id="checkbox_<?= $item['name'] ?>_<?= $item['attribute_id'] ?>" 
                           name="checkbox_<?= $item['name'] ?>_<?= $item['attribute_id'] ?>" 
                           type="checkbox" 
                           <?php if (isset($selected_values["checkbox_".$item['name']."_".$item['attribute_id'].""])): ?>
                           	checked
                           <?php endif; ?>
                           >
 		 			<label for="checkbox_<?= $item['name'] ?>_<?= $item['attribute_id'] ?>"><?= $item['name'] ?> (<?= $item['count'] ?>)</label>
 		 			<?php 	endforeach; ?>
 		 		</div>
 		 	<?php endif;	endforeach; ?>

 		 		<div class="filter_elements_items_item">
 		 			<p class="filter_elements_items_item_title">Виробники</p>
 		 			<?php 	foreach ($producers_list as $keys => $item):  ?>
                    <input id="producer_<?= $item['name'] ?>_<?= $item['id'] ?>" 
                           name="producer_<?= $item['name'] ?>_<?= $item['id'] ?>" 
                           type="checkbox" 
                           <?php if (isset($selected_values["checkbox_".$item['name']."_".$item['id'].""])): ?>
                           	checked
                           <?php endif; ?>
                           >
 		 			<label for="producer_<?= $item['name'] ?>_<?= $item['id'] ?>"><?= $item['name'] ?> (<?= $item['count'] ?>)</label>
 		 			<?php 	endforeach; ?>
 		 		</div>
               <!--<div class="filter_elements_items_item">
 		 		<p class="filter_elements_items_item_title">Потужність</p>
 		 		<input id="checkbox1" name="checkbox" type="checkbox" checked="checked">
 		 		<label for="checkbox1">Choice A</label>

 		 		<input id="checkbox1" name="checkbox" type="checkbox" checked="checked">
 		 		<label for="checkbox1">Choice A</label>
 		 	</div> -->
 		 	
 		 </div>
	</div>
</div>
<script src='https://code.jquery.com/ui/1.11.4/jquery-ui.min.js'></script>

<script>
    <?php echo $this->Html->scriptStart(['block' => true]); ?>

   	$(document).ready(function() {
    $("#slider").slider({
        range: true,
        min: <?= $current_value_min ?>,
        max: <?= $current_value_max ?>,
        step: 1,
        values: [<?= $min_price ?>, <?= $max_price?>],
        animate: 300,
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $("input.sliderValue[data-index=" + i + "]").val(ui.values[i]);
            }
        }
    });

    $("input.sliderValue").change(function() {
        var $this = $(this);
        $("#slider").slider("values", $this.data("index"), $this.val());
    });
});

	<?php echo $this->Html->scriptEnd(); ?>
</script>