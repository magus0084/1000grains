<?php
/*
 Template Name: Programs (How We Do It) Top Level Page
 *
 * Template for the top level programs page.  
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
											<?php 
												$introduction_video = get_field('introduction_video');
												if (!empty($introduction_video)) : ?>
													<figure class="article-top-standout pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 shadow--l">
														<div class="article-video">
															<?php echo $introduction_video; ?>
														</div>
													</figure>
											<?php endif; ?>
										</div>
									</section> <?php // end Video section ?>
									
									<section class="entry-content cf margin-b--xl"> 
										<div class="wrap text-align--center">
											<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 hasDivider--special">
												<h2 class="margin-t--m"><?php echo get_field('content_area_1_title'); ?></h2>
												<div class="margin-t--m">
													<p class="margin-t--m">
													<?php // Content Area Text
														echo get_field('content_area_1_text'); 
													?>
													</p>
												</div>
												
												<?php 
													$method_link_title = get_field('method_link_title');
													if(!empty($method_link_title)) : ?>
														<div class="margin-t--l">
															<a class="link--p1" href="<?php echo get_permalink( get_page_by_path( 'programs/our-method' ) ); ?>"><?php echo $method_link_title; ?></a>
														</div>
												<?php endif; ?>
											</div>
										</div>
									</section> <?php // end Content Area Section ?>
									
									<section class="entry-content cf margin-b--xl" itemprop="articleBody">
										<div class="wrap text-align--center">
											<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--left hasDivider--special">
												<h2 class="margin-t--m text-align--center"><?php echo get_field ('programs_list_title'); ?></h2>
											</div>
											<div class="pure-u-1-1 margin-t--m">
												<?php programs_list(); ?>
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
