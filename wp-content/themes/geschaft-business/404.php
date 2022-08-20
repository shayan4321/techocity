<?php
/**
 * The template for displaying 404 pages (not found)
 * @subpackage Geschaft Business
 * @since 1.0
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<main id="content" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><span><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'geschaft-business' ); ?></span></h1>
					<div class="home-btn">
						<a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'GO BACK', 'geschaft-business' ); ?></a>
					</div>
				</header>
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'geschaft-business' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</main>
	</div>
</div>

<?php get_footer();