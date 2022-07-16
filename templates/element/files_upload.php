<div class="form-group images-upload ">

	<?php

	if (!empty($images_edit_data)) {	// edit data
		foreach ($images_edit_data as $key => $image) :
			if ($image->has('path')) {
	?>
				<div class="well well-sm">
					<div class="row images-upload-row">

						<div class="col-md-10">
							<?php echo $this->element('display_file_icon', [ 'file' => $image ]); ?>
							<label> <?php echo $image['name']; ?> </label>
						</div>

						<?php
						if (!isset($can_remove) || (isset($can_remove) && $can_remove)) { ?>
							<div class="col-md-2 images-buttons text-right">
								<?php
								print $this->Html->link('<i class="far fa-times-circle"></i>', '#', array(
									'class' => 'btn-remove-uploaded-image',
									'data-image-id' => $image['id'],
									'escape' => false
								));
								?>
							</div>
						<?php }
						?>
					</div>
				</div>
	<?php
			}
		endforeach;
	}
	?>


	<!-- add function -->
	<div class="well well-sm">
		<div class="row images-upload-row">

			<div class="col-md-10">
				<?php
				echo $this->Form->control($files_model . '..image', array(
					'type' => 'file',
					'accept' => ".pdf, .xlsx, .xls, .docx, .doc",
					'label' => __("file"),
					'multiple' => 'multiple'
				));
				?>
			</div>

			<div class="col-md-2 images-buttons text-right">
				<?php
				echo $this->Html->link('<i class="far fa-times-circle"></i>', '#', array(
					'class' => 'btn-remove-image',
					'escape' => false
				));
				?>
			</div>

			<div class="form-group-label col-md-12">
				<span class="image-type-limitation"></span>
			</div>
		</div>
	</div>

</div><!-- .form-group -->

<script type="text/javascript" charset="utf-8">

	$(document).ready(function() {

		$('.btn-remove-uploaded-image').on('click', function(e) {
			e.preventDefault();

			var image_id = $(this).data('image-id');

			var remove_hidden_input = '<input type="hidden" name="data[remove_image][]" value="' + image_id + '">';

			$(this).parents('.images-upload').append(remove_hidden_input);
			$(this).closest(".well").remove();
		});
	});
</script>