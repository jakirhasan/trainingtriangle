<?php
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
if ( ! function_exists( 'trainingtriangle_post_thumbnail' ) ) :
	function trainingtriangle_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('trainingtriangle-large'); ?>
			</div><!-- .post-thumbnail -->
		<?php else : ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail( 'trainingtriangle-medium' );
				?>
			</a>
		<?php endif; // End is_singular().
	}
endif;
