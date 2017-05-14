<?php
/*
 Template Name: What We Do Page
 *
 * Template for the What we do page.
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
								
								<?php // QUOTES AND INTRO HEADER ?>
								<header class="article-header text-align--center content-header quotes-header">
									<div class="wrap">
										
										<?php // QUOTES HEADER ?>
										<h2 class="margin-b--m pure-u-1-1 pure-u-sm-2-3 pure-u-md-1-2 pure-u-lg-2-3">
											<?php echo get_field('quotes_title') ?>
										</h2>
										
										<?php // QUOTE ?>
										<q class="pure-u-1-1 pure-u-sm-2-3 pure-u-md-1-2 pure-u-lg-2-3 quote">
											<?php echo get_field('quote_1'); ?>
										</q>
										
										<?php // QUOTE PERSON ?>
										<p class="text-align--center quote-person">
											<?php 
												$quote_1_name = get_field('quote_1_name');
												if (!empty($quote_1_name)) : ?>
													<?php echo $quote_1_name; ?><br/>
											<?php endif; ?>
											
											<?php 
												$quote_1_person_title = get_field('quote_1_person_title');
												if (!empty($quote_1_person_title)) : ?>
													<span class="quote-person-title"><?php echo $quote_1_person_title; ?></span>
											<?php endif; ?>
										</p>
										
										
									</div>
								</header> <?php // end article header ?>

								<div class="article-content-wrapper">
									
									<?php // CONSEQUENCES SECTION ?>
									<section itemprop="articleBody" class="consequences-section entry-content cf margin-b--m">
										<div class="wrap text-align--center margin-b--l">
											
											<?php // CONSEQUENCES SECTION INTRO ?>
											<header class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2">
												<h2 class="margin-t--m">
													<?php echo get_field('consequences_intro_title'); ?>
												</h2>
												
												<?php 
													$consequences_intro_text = get_field('consequences_intro_text');
													if (!empty($consequences_intro_text)) : ?>
														<p class="margin-t--m">
															<?php echo $consequences_intro_text; ?>
														</p>
												<?php endif; ?>
											</header>
										</div>
										
										<article class="wrap pure-g text-align--center">
											<section class="pure-u-1-1 pure-u-md-1-3 text-align--left content-column margin-b--l">
												<article>
													<?php // Consequences Image 1
														$consequences_image_1 = get_field('consequences_image_1'); 
														if (!empty($consequences_image_1)) : ?>
															<figure>
																<img src="<?php echo $consequences_image_1; ?>">
															</figure>
													<?php endif; ?>
													<h3 class="text-align--center">
														<?php 
															// Consequences Title 1 
															echo get_field ('consequences_title_1'); 
														?></h3>
													<p>
														<?php // Consequences Text 1 Text
															echo get_field ('consequences_text_1'); 
														?>
													</p>
												</article>
											</section>
											
											<section class="pure-u-1-1 pure-u-md-1-3 text-align--left content-column margin-b--l">
												<article>
													<?php // Consequences Image 2
														$consequences_image_2 = get_field('consequences_image_2'); 
														if (!empty($consequences_image_2)) : ?>
															<figure>
																<img src="<?php echo $consequences_image_2; ?>">
															</figure>
													<?php endif; ?>
													<h3 class="text-align--center">
														<?php 
															// Consequences Title 2 
															echo get_field ('consequences_title_2'); 
														?></h3>
													<p>
														<?php // Consequences Text 2 Text
															echo get_field ('consequences_text_2'); 
														?>
													</p>
												</article>
											</section>
											
											<section class="pure-u-1-1 pure-u-md-1-3 text-align--left content-column margin-b--l">
												<article>
													<?php // Consequences Image 3
														$consequences_image_3 = get_field('consequences_image_3'); 
														if (!empty($consequences_image_3)) : ?>
															<figure>
																<img src="<?php echo $consequences_image_3; ?>">
															</figure>
													<?php endif; ?>
													<h3 class="text-align--center">
														<?php 
															// Consequences Title 3 
															echo get_field ('consequences_title_3'); 
														?></h3>
													<p>
														<?php // Consequences Text 3 Text
															echo get_field ('consequences_text_3'); 
														?>
													</p>
												</article>
											</section>
										</article>
									</section><?php // end CONSEQUENCES SECTION ?>
									
									
									
									
									<?php // INVOLVEMENT SECTION ?>
									<section class="entry-content cf involvement-section"> 
										<article class="wrap text-align--center">
											
											<?php // INVOLVEMENT POINT 1 ?>
											<section class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 hasDivider--special margin-b--l">
												<h2 class="margin-t--m margin-b--s">
													<?php echo get_field('involvement_1_title'); ?>
												</h2>
												<?php echo get_field('involvement_1_text'); ?>
											</section>
											
											<?php // INVOLVEMENT Image 1 ?>
											<figure class="pure-u-1-1 pure-u-md-1-2">
												<img src="<?php echo get_field('involvement_1_diagram'); ?>" alt="<?php echo get_field('involvement_1_title'); ?>">
											</figure>
											
											<div class="pure-g margin-t--xxl margin-b--xxl involvement-section-content-2">
												<?php // INVOLVEMENT POINT 2 ?>
												<section class="pure-u-1-1 pure-u-md-1-2 text-align--left padding--l involvement-section-2-text">
													<div>
														<h2 class="margin-b--s">
															<?php echo get_field('involvement_2_title'); ?>
														</h2>  
														<?php echo get_field('involvement_2_text'); ?>
												
														<?php
															$involvement_2_link = get_field('involvement_2_link');
															if (!empty($involvement_2_link)) : ?>
																<p>
																	<a class="link--p1" href="<?php echo $involvement_2_link; ?>">
																		<?php 
																			$involvement_2_link_title = get_field('involvement_2_link_title');
																			if (!empty($involvement_2_link_title)) :
																				echo $involvement_2_link_title;
																			else :
																				echo 'See Our Method';
																			endif;
																		?>
																	</a>
																</p>
														<? endif; ?>
													</div>
												</section>
											
												<?php // INVOLVEMENT IMAGE 2 ?>
												<figure class="pure-u-1-1 pure-u-md-1-2 padding--l involvement-section-2-image">
													<img src="<?php echo get_field('involvement_2_diagram'); ?>">
												</figure>
											</div>
										</article>
									</section> <?php // end INVOLVEMENT SECTION ?>
									
									
									<?php // PROGRAMS SECTION ?>
									<section class="entry-content cf programs-section">
										<article class="wrap text-align--center">
											
											<?php // PROGRAMS CONTENT ?>
											<section class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2">
												<h2 class="margin-t--m margin-b--s">
													<?php echo get_field('programs_title'); ?>
												</h2>
												<?php echo get_field('programs_text'); ?>
											</section>
											
											<?php // List of Programs ?>
											<section class="pure-u-1-1 margin-t--m margin-b--xxl">
												<?php programs_list(); ?>
											</section>
										</article>
									</section><?php // end PROGRAMS SECTION ?>
									
									
									
									<?php // DONATE SECTION ?>
									<footer class="entry-content cf margin-t--xl donate-section">
										<article class="wrap text-align--center">
											
											<?php // DONATE CONTENT ?>
											<section class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 hasDivider--special">
												<h2 class="margin-t--m">
													<?php echo get_field('donate_title'); ?>
												</h2>
												<p class="margin-t--m">
													<?php echo get_field('donate_text'); ?>
												</p>
											</section>
											
											<?php // DONATE BUTTON ?>
											<div class="margin-t--m margin-b--xxxl">
												<?php $secondary_call_to_action_link = get_field('secondary_call_to_action_link');
													$secondary_call_to_action_title = get_field('secondary_call_to_action_title');
													
													if(!empty($secondary_call_to_action_link) && !empty($secondary_call_to_action_title)) : ?>
														<a class="btn--p1 btn--alt margin-r--s" href="<?php echo get_field('donate_link'); ?>">
															<?php echo get_field('donate_link_title'); ?>
														</a>
														<a class="btn--p1 btn--alt" href="<?php echo $secondary_call_to_action_link; ?>">
															<?php echo $secondary_call_to_action_title; ?>
														</a>
													<?php else : ?>
														<a class="btn--p1" href="<?php echo get_field('donate_link'); ?>">
															<?php echo get_field('donate_link_title'); ?>
														</a>
												<?php endif; ?>
											</div>
										</article>
									</footer><?php // end DONATE SECTION ?>
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
