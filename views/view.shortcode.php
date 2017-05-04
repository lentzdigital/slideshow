<div class="slider">
	<?php foreach($query as $slide) : ?>
		<div class="slide">
			<img src="<?= $slide->image; ?>" alt="">
			<p><?= $slide->text; ?></p>
		</div>
	<?php endforeach; ?>
</div>