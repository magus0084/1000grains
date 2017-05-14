<?php
/*
 Template Name: Program Details Page
 *
 * Template for individual programs.   
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
									
									<?php 
										$program_video = get_field('program_video');
										if (!empty($program_video)) : ?>
											<section class="entry-content cf margin-b--xl" itemprop="articleBody">
												<div class="wrap text-align--center">
													<figure class="article-top-standout pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 shadow--l">
														<div class="article-video">
															<?php echo $program_video; ?>
														</div>
													</figure>
												</div>
											</section> 
										<?php endif; ?>
									<?php // end Video section ?>
									
									<section class="entry-content cf margin-b--xl" itemprop="articleBody">
										<div class="wrap text-align--center">
											<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--left hasDivider--special">
												<h2 class="margin-t--m text-align--center">Goals</h2>
												<div class="margin-t--m text-align--left">
													<?php // Goals
														echo get_field('goals_text'); 
													?>
												</div>
											</div>
											
											<?php // Program Image 1 ?>
											<?php 
												$program_image_1 = get_field('program_image_1');
												if (!empty($program_image_1)) : ?>
													<div class="pure-u-1-1 margin-t--l">
														<img src="<?php echo $program_image_1 ?>" alt="Program Image">
													</div>
											<?php endif; ?>
										</div>
									</section> <?php // end Goals section ?>
									
									<section class="entry-content cf margin-b--xl" itemprop="articleBody">
										<div class="wrap text-align--center">
											<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--left hasDivider--special">
												<h2 class="margin-t--m text-align--center">Our Personal Approach</h2>
												<div class="margin-t--m text-align--left">
													<?php // Personal Approach
														echo get_field('personal_approach_text'); 
													?>
												</div>
											</div>
											
											<?php // Program Quote 1 ?>
											<?php 
												$program_quote_1 = get_field('program_quote_1');
												if (!empty($program_quote_1)) : ?>
													<div class="pure-u-1-1 text-align--center margin-t--l margin-b--l">
														<q class="quote">
															<?php echo $program_quote_1; ?>
														</q>
														<p class="text-align--center quote-person">
															<?php 
																$program_quote_1_name = get_field('program_quote_1_name');
																if (!empty($program_quote_1_name)) : ?>
																	<?php echo $program_quote_1_name; ?><br/>
															<?php endif; ?>
															<span class="quote-person-title">Program Participant</span>
														</p>
													</div>
											<?php endif; ?>
										</div>
									</section> <?php // end Personal Approach section ?>
									
									<section class="entry-content cf margin-b--xl" itemprop="articleBody">
										<div class="wrap text-align--center">
											<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--left hasDivider--special">
												<h2 class="margin-t--m text-align--center">Impact</h2>
												<div class="margin-t--m text-align--left">
													<?php // Impact
														echo get_field('impact_text'); 
													?>
												</div>
											</div>
											
											<?php // Program Image 2 ?>
											<?php 
												$program_image_2 = get_field('program_image_2');
												if (!empty($program_image_2)) : ?>
													<div class="pure-u-1-1 margin-t--l">
														<img src="<?php echo $program_image_2; ?>" alt="Program Image">
													</div>
											<?php endif; ?>
											
											<?php // Program Quote 2 ?>
											<?php 
												$program_quote_2 = get_field('program_quote_2');
												if (!empty($program_quote_2)) : ?>
												<div class="pure-u-1-1 text-align--center margin-t--l margin-b--l">
													<q class="quote">
														<?php echo $program_quote_2; ?>
													</q>
													<p class="text-align--center quote-person">
														<?php 
															$program_quote_2_name = get_field('program_quote_2_name');
															if (!empty($program_quote_2_name)) : ?>
																<?php echo $program_quote_2_name; ?><br/>
														<?php endif; ?>
														<span class="quote-person-title">Program Participant</span>
													</p>
												</div>
											<?php endif; ?>
										</div>
									</section> <?php // end Impact section ?>
									
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
