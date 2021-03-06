<?php
/**
 * Template part for displaying pages on front page.
 *
 * @package Twenty Seventeen
 */

global $twentyseventeencounter;

$current_panel_layout = 'twentyseventeen_panel' . $twentyseventeencounter . '_layout';
$panel_layout = get_theme_mod( $current_panel_layout, 'one-column' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' . esc_attr( $panel_layout ) ); ?> >

	<span class="panel twentyseventeen-panel<?php echo esc_attr( $twentyseventeencounter ); ?>" id="panel<?php echo esc_attr( $twentyseventeencounter ); ?>">
		<span class="twentyseventeen-panel-title"><?php printf( __( 'Panel %1$s', 'twentyseventeen' ), esc_attr( $twentyseventeencounter ) ); ?></span>
	</span>

	<?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );

		$thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );
		//Calculate aspect ratio: h / w * 100%
		$ratio = $thumbnail_attributes[2] / $thumbnail_attributes[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
			<div class="panel-image-prop" style="padding-top: <?php echo esc_attr( $ratio ); ?>%"></div>
		</div>

	<?php endif; ?>

	<div class="panel-content">
		<div class="wrap">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

				<?php twentyseventeen_edit_link( get_the_ID() ); ?>

			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					the_content( sprintf(
						__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentyseventeen' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				?>
			</div><!-- .entry-content -->

		</div><!-- .wrap -->
	</div><!-- .panel-content -->

</article><!-- #post-## -->
