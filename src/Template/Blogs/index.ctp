<div class="breadcrums">
	<div class="breadcrums_list">
		<p class="breadcrums_title">Блог</p>
		<div class="breadcrums_list_item">
			<a href="<?= $this->Url->build(['controller' => 'main','action'    =>  'index/'], ['fullBase' => true]) ?>">Головна</a>
			<span> / </span>
			<a href="<?= $this->Url->build(['controller' => 'blogs','action'    =>  'index/'], ['fullBase' => true]) ?>">Блог</a>
			
		</div>
	</div>
</div>
<div class="blog_container container">
		<div class="row">
			<div class="col-md-3">
				<div class="search_form blog_search">
					<form action="">
						<input type="text" placeholder="">
						<label for="submit" class="search_form_label">
                                <i class="fa fa-search"></i>
                                <input type="submit" value="Надіслати" name="submit">
                            </label>
					</form>
				</div>
				<div class="blog_last">	
					<div class="blog_title">
						<p>Останні новини</p>
					</div>
					<div class="blog_container">
						
					</div>
				</div>
				<div class="blog_last">	
					<div class="blog_title">
						<p>Категорії</p>
					</div>
					<div class="blog_container">
						
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<?php 	foreach ($blogs as $key => $value):?>
				<div class="blog_item">
					<div class="blog_item_image">
						<img src="<?= $this->Url->build('/img/blog_item.png', ['fullBase' => true]) ?>" alt="">
					</div>
					<div class="blog_item_inside">
						<div class="blog_item_data">
						<p>29 Лютого, 2020</p>
					</div>
					<div class="blog_item_title">
						<p><?= $value['title'] ?></p>
					</div>
					<div class="blog_item_description">
						<p><?= $value['description'] ?></p>
					</div>
					<div class="blog_item_link">
						<a href="<?= $this->Url->build(['controller' => 'categories','action'    =>  'view/'.$value['slug']], ['fullBase' => true]) ?>">Детальніше</a>
					</div>
					<div class="blog_item_auth">
						<p> <i class="fa fa-pencil"></i> admin</p>
						<p> <i class="fa fa-pencil"></i> 1 контар</p>
					</div>
					</div>
					
				</div>
			<?php 	endforeach; ?>
			</div>
		</div>	
	</div>
