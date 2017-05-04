<form method="post">
	<table class="widefat images">
		<tr>
			<th class="row-title">Image</th>
			<th>Image text</th>
		</tr>
		<?php foreach($this->getSlides($post_id) as $slide) : ?>
			<tr>
				<td class="row-title">
					<img width="150" src="<?= $slide->image; ?>">
				</td>
				<td><?= $slide->text; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<div class="add-slide">
		<a href="#" id="uploadnewslide" class="button-primary">New slide</a>
	</div>
</form>