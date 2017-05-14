<?php
/*
 Template Name: Organization Page
 *
 * Template for the organization section top page.
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
								
								<header class="article-header text-align--center content-header">
									<div class="wrap">
										<h1 class="page-title" itemprop="headline"><span class="hasAccent"><?php the_title(); ?></span></h1>
									</div>
								</header> <?php // end article header ?>

								<div class="article-content-wrapper">
									<section class="entry-content cf margin-b--xl" itemprop="articleBody">
										<div class="wrap text-align--center">
											
											<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--center hasDivider--special">
												<h2 class="margin-t--m"><?php echo get_field('organization_summary_title'); ?></h2>
												<p>
													<?php
														// the content (pretty self explanatory huh)
														the_content();
													?>
												</p>
												<nav class="margin-t--l">
													<a class="link--p1" href="<?php echo get_permalink( get_page_by_path( 'organization/mission' ) ); ?>">
														<?php echo get_field('organization_summary_link_text'); ?>
													</a>
												</nav>
											</div>
										</div>
									</section> <?php // end article section ?>
									
									<section class="margin-b--xl bg-collage" style="background-image: url('<?php echo get_field( 'organization_links_background_image' ) ?>');">
										<div class="wrap text-align--center">
											<div class="padding--l pure-u-7-8 pure-u-md-1-2 overlay-content">
												<h2><?php echo get_field('organization_links_title'); ?></h2>
												<div class="pure-g">
													<div class="pure-u-1-1 padding--s">
														<a class="btn--p1 btn--alt" href="<?php echo get_field( 'organization_link_url1' ); ?>">
															<?php echo get_field( 'organization_link_text1' ); ?>
														</a>
													</div>
													<div class="pure-u-1-1 padding--s">
														<a class="btn--p1 btn--alt" href="<?php echo get_field( 'organization_link_url2' ); ?>">
															<?php echo get_field( 'organization_link_text2' ); ?>
														</a>
													</div>
													<?php if (!null == get_field( 'organization_link_url3' ) && !null == get_field( 'organization_link_text3' )) : ?>
														<div class="pure-u-1-1 padding--s">
															<a class="btn--p1 btn--alt" href="<?php echo get_field( 'organization_link_url3' ); ?>">
																<?php echo get_field( 'organization_link_text3' ); ?>
															</a>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</section>
									
									<?php donate_footer(); ?>
								</div>
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
