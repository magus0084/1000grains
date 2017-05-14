<?php
/*
 Template Name: Thank You Page
 *
 * Template for the Thank You page.
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								
							<?php set_bg_img(array(
								'id' => get_the_ID()
							)); ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
								
								<?php // Thank You and Header ?>
								<header class="article-header text-align--center content-header">
									<div class="wrap">
										
										<?php // THANK YOU HEADER ?>
										<h1 class="margin-b--s pure-u-1-1 pure-u-sm-2-3 pure-u-md-1-2 pure-u-lg-2-3 page-title" itemprop="headline">
											<span class="hasAccent"><?php echo get_field('thank_you_title') ?></span>
										</h1>
										
										<?php // Thank You Message ?>
										<?php
											$thank_you_text = get_field('thank_you_text');
											if (!empty($thank_you_text)) : ?>
												<p class="pure-u-1-1 pure-u-sm-2-3 pure-u-md-1-2 pure-u-lg-2-3">
													<?php echo $thank_you_text ?>
												</p>
										<?php endif; ?>
										
										<?php // Thank You Link ?>
										<div class="margin-t--m">
											<a class="btn--p1" href="<?php echo get_field('thank_you_link'); ?>">
												<?php echo get_field('thank_you_link_title'); ?>
											</a>
										</div>
									</div>
								</header> <?php // end article header ?>
							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
