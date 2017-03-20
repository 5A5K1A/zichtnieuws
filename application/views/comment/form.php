<section class="form">

	<?php
		echo validation_errors();

		echo form_open('comment/form', '', array('postid' => $post_id) );

		echo form_label('Naam <span class="required">*</span>', 'author');
		echo form_input('author', '', array('required' => 'required'));

		echo form_label('E-mail <span class="required">*</span>', 'email');
		echo form_input('email', '', array('required' => 'required'));

		echo form_label('Reactie <span class="required">*</span>', 'comment');
		echo form_textarea('comment', '', array('rows' => 6, 'required' => 'required'));

		echo form_submit('submit', 'reageer');
	?>

	</form>
</section>
