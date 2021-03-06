<?php
/*
 Template Name: Our Method Page
 *
 * Template for the Our Method page.  
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
									
									<section class="entry-content cf margin-b--xl"> 
										<article class="wrap text-align--center">
											<header class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 hasDivider--special margin-b--m">
												<h2 class="margin-t--m"><?php echo get_field('main_points_title'); ?></h2>
											</header>
											
											<div class="pure-g">
												<section class="pure-u-1-1 pure-u-md-1-3 content-column text-align--left">
													<?php 
														$main_point_1_image = get_field('main_point_1_image');
														if(!empty($main_point_1_image)) : ?>
															<img src="<?php echo $main_point_1_image ?>" alt="Main Point Image 1">
													<?php endif; ?>
												
													<h3 class="text-align--center"><?php echo get_field('main_point_1_title')?></h3>
													<?php echo get_field('main_point_1_content'); ?>
												</section>
											
												<section class="pure-u-1-1 pure-u-md-1-3 content-column text-align--left">
													<?php 
														$main_point_2_image = get_field('main_point_2_image');
														if(!empty($main_point_2_image)) : ?>
															<img src="<?php echo $main_point_2_image ?>" alt="Main Point Image 2">
													<?php endif; ?>
												
													<h3 class="text-align--center"><?php echo get_field('main_point_2_title')?></h3>
													<?php echo get_field('main_point_2_content'); ?>
												</section>
											
												<section class="pure-u-1-1 pure-u-md-1-3 content-column text-align--left">
													<?php 
														$main_point_3_image = get_field('main_point_3_image');
														if(!empty($main_point_3_image)) : ?>
															<img src="<?php echo $main_point_3_image ?>" alt="Main Point Image 3">
													<?php endif; ?>
												
													<h3 class="text-align--center"><?php echo get_field('main_point_3_title')?></h3>
													<?php echo get_field('main_point_3_content'); ?>
												</section>
											</div>
										</article>
									</section> <?php // end Main Points Section ?>
									
									<section class="entry-content cf margin-b--xl"> 
										<div class="wrap text-align--center">
											<article class="content-paragraph pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 hasDivider--special">
												<h2 class="margin-t--m"><?php echo get_field('content_area_2_title'); ?></h2>
												<div class="margin-t--m margin-b--m">
													<?php // Content Area Text
														echo get_field('content_area_2_text'); 
													?>
												</div>
											</article>
										</div>
									</section> <?php // end Content Area Section ?>
									
									<section class="entry-content cf margin-b--xl"> 
										<article class="wrap text-align--center">
											<header class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 hasDivider--special">
												<h2 class="margin-t--m"><?php echo get_field('statistics_title'); ?></h2>
											</header>
											<div class="margin-t--m pure-g">
												<section class="pure-u-1-1 pure-u-md-1-3 content-column margin-b--m">
													<?php 
														$statistic_1_image = get_field('statistic_1_image');
														if(!empty($statistic_1_image)) : ?>
															<img src="<?php echo $statistic_1_image ?>" alt="<?php echo $statistic_1_title ?>">
													<?php endif; ?>

													<h3><?php echo get_field('statistic_1_title'); ?></h3>
												</section>
												
												<section class="pure-u-1-1 pure-u-md-1-3 content-column margin-b--m">
													<?php 
														$statistic_2_image = get_field('statistic_2_image');
														if(!empty($statistic_2_image)) : ?>
															<img src="<?php echo $statistic_2_image ?>" alt="<?php echo $statistic_2_title ?>">
													<?php endif; ?>

													<h3><?php echo get_field('statistic_2_title'); ?></h3>
												</section>
												
												<section class="pure-u-1-1 pure-u-md-1-3 content-column margin-b--m">
													<?php 
														$statistic_3_image = get_field('statistic_3_image');
														if(!empty($statistic_3_image)) : ?>
															<img src="<?php echo $statistic_3_image ?>" alt="<?php echo $statistic_3_title ?>">
													<?php endif; ?>

													<h3><?php echo get_field('statistic_3_title'); ?></h3>
												</section>
												
												<section class="pure-u-1-1 pure-u-md-1-3 content-column margin-b--m">
													<?php 
														$statistic_4_image = get_field('statistic_4_image');
														if(!empty($statistic_4_image)) : ?>
															<img src="<?php echo $statistic_4_image ?>" alt="<?php echo $statistic_4_title ?>">
													<?php endif; ?>

													<h3><?php echo get_field('statistic_4_title'); ?></h3>
												</section>
												
												<section class="pure-u-1-1 pure-u-md-1-3 content-column">
													<?php 
														$statistic_5_image = get_field('statistic_5_image');
														if(!empty($statistic_5_image)) : ?>
															<img src="<?php echo $statistic_5_image ?>" alt="<?php echo $statistic_5_title ?>">
													<?php endif; ?>

													<h3><?php echo get_field('statistic_5_title'); ?></h3>
												</section>
												
												<?php
													$statistic_6_title = get_field('statistic_6_title');
													if (!empty($statistic_6_title)) : ?>
													
													<section class="pure-u-1-1 pure-u-md-1-3 content-column">
														<?php 
															$statistic_6_image = get_field('statistic_6_image');
															if(!empty($statistic_6_image)) : ?>
																<img src="<?php echo $statistic_6_image ?>" alt="<?php echo $statistic_6_title ?>">
														<?php endif; ?>
													
														<h3><?php echo get_field('statistic_6_title')?></h3>
													</section>
													
												<?php endif; ?>
											</div>
										</article>
									</section> <?php // end Statistics Section ?>
									
									<section class="entry-content cf margin-b--xl" itemprop="articleBody">
										<article class="wrap text-align--center">
											<header class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--left hasDivider--special">
												<h2 class="margin-t--m text-align--center"><?php echo get_field ('programs_list_title'); ?></h2>
											</header>
											<section class="pure-u-1-1 margin-t--m">
												<?php programs_list(); ?>
											</section>
										</article>
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
