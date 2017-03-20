<section class="overview">

<?php if( !is_array($comments) ) : ?>
	<p class="no-comment"><?php echo $comments; ?></p>

<?php else : ?>
	<h2>Eerdere reacties</h2>

	<?php foreach( (array) $comments as $comment ) : ?>

	<div class="single-comment">
		<span class="author"><span class="name"><?php echo $comment['author_name']; ?></span> (<?php echo $comment['author_email']; ?>) <?php echo studio_get_the_timetoshow($comment['created'], 8); ?></span>
		<p class="comment"><?php echo nl2br( $comment['comment'] ); ?></p>
	</div>
<?php endforeach;
endif; ?>
</section>
