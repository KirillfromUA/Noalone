<?php $prev = get_previous_post_link( __( '&laquo; %link', 'base' ) ) ?>
<?php $next = get_next_post_link( __( '%link &raquo;', 'base' ) ) ?>
<?php if( $prev || $next ) : ?>
	<div class="navigation-single">
		<?php if( $next ) : ?><div class="next"><?php echo $next ?></div><?php endif ?>
		<?php if( $prev ) : ?><div class="prev"><?php echo $prev ?></div><?php endif ?>
	</div>
<?php endif ?>