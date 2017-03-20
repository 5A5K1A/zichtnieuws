<section class="success">
	<p>Je reactie is geplaatst.</p>
	<div class="single-comment">
		<span class="author"><span class="name"><?php echo $new_comment['author_name']; ?></span> (<?php echo $new_comment['author_email']; ?>) zojuist</span>
		<p class="comment"><?php echo nl2br( $new_comment['comment'] ); ?></p>
	</div>
</section>
