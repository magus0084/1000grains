<?php
/*
 Template Name: Partner Profile Page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
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
									<?php // start opening summary section 
									if (!null == get_field('page_summary_title') && !null == get_field('page_summary')) : ?>
										<section class="entry-content cf margin-b--l" itemprop="articleBody">
											<div class="wrap text-align--center">
											
												<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--center hasDivider--special">
													<h2 class="margin-t--m"><?php echo get_field('page_summary_title'); ?></h2>
													<p>
														<?php
															echo get_field('page_summary');
														?>
													</p>
													<?php // Add summary link if available
														if (!null == get_field('page_summary_link_url') || !null == get_field('page_summary_link_text')) : ?>
														<nav class="margin-t--l">
															<a class="link--p1" href="<?php echo get_field('page_summary_link_url'); ?>">
																<?php echo get_field('page_summary_link_text'); ?>
															</a>
														</nav>
													<?php endif; ?>
												</div>
											</div>
										</section> <?php // end opening summary section ?>
									<?php endif; ?>
									
									<section class="entry-content cf" itemprop="articleBody">
										<div class="wrap pure-g text-align--center">
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url'),
												'name' => get_field('partner_name'),
												'title' => get_field('partner_title'),
												'profile_text' => get_field('partner_profile'),
												'website_url' => get_field('partner_website_url'),
												'custom_class' =>'text-align--center'
											)); ?>
											
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url2'),
												'name' => get_field('partner_name2'),
												'title' => get_field('partner_title2'),
												'profile_text' => get_field('partner_profile2'),
												'website_url' => get_field('partner_website_url2'),
												'custom_class' =>'text-align--center'
											)); ?>
											
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url3'),
												'name' => get_field('partner_name3'),
												'title' => get_field('partner_title3'),
												'profile_text' => get_field('partner_profile3'),
												'website_url' => get_field('partner_website_url3'),
												'custom_class' =>'text-align--center'
											)); ?>
											
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url4'),
												'name' => get_field('partner_name4'),
												'title' => get_field('partner_title4'),
												'profile_text' => get_field('partner_profile4'),
												'website_url' => get_field('partner_website_url4'),
												'custom_class' =>'text-align--center'
											)); ?>
											
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url5'),
												'name' => get_field('partner_name5'),
												'title' => get_field('partner_title5'),
												'profile_text' => get_field('partner_profile5'),
												'website_url' => get_field('partner_website_url5'),
												'custom_class' =>'text-align--center'
											)); ?>
											
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url6'),
												'name' => get_field('partner_name6'),
												'title' => get_field('partner_title6'),
												'profile_text' => get_field('partner_profile6'),
												'website_url' => get_field('partner_website_url6'),
												'custom_class' =>'text-align--center'
											)); ?>
											
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url7'),
												'name' => get_field('partner_name7'),
												'title' => get_field('partner_title7'),
												'profile_text' => get_field('partner_profile7'),
												'website_url' => get_field('partner_website_url7'),
												'custom_class' =>'text-align--center'
											)); ?>
											
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url8'),
												'name' => get_field('partner_name8'),
												'title' => get_field('partner_title8'),
												'profile_text' => get_field('partner_profile8'),
												'website_url' => get_field('partner_website_url8'),
												'custom_class' =>'text-align--center'
											)); ?>
											
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url9'),
												'name' => get_field('partner_name9'),
												'title' => get_field('partner_title9'),
												'profile_text' => get_field('partner_profile9'),
												'website_url' => get_field('partner_website_url9'),
												'custom_class' =>'text-align--center'
											)); ?>
											
											<?php partner_profile(array(
												'img_url' => get_field('partner_logo_url10'),
												'name' => get_field('partner_name10'),
												'title' => get_field('partner_title10'),
												'profile_text' => get_field('partner_profile10'),
												'website_url' => get_field('partner_website_url10'),
												'custom_class' =>'text-align--center'
											)); ?>
										</div>
									</section> <?php // end article section ?>

									<?php
										$call_to_action_footer_title = get_field('call_to_action_footer_title');
									 	$call_to_action_footer_content = get_field('call_to_action_footer_content'); 
										
										if (!empty($call_to_action_footer_content) && !empty($call_to_action_footer_title)) : ?>
											<footer class="article-footer cf">
												<div class="wrap text-align--center hasDivider">
													<article class="text-align--center article-footer-default">
														<h4 class="margin-b--xs"><?php echo $call_to_action_footer_title; ?></h4>
														<p><?php echo $call_to_action_footer_content; ?></p>
														
														<?php 
															$call_to_action_footer_button = get_field('call_to_action_footer_button'); 
															$call_to_action_footer_button_link = get_field('call_to_action_footer_button_link');
															
															if (!empty($call_to_action_footer_button) && !empty($call_to_action_footer_button_link)) : ?>
															<div class="margin-t--m">
																<a class="btn--p1" href="<?php echo get_field('call_to_action_footer_button_link'); ?>">
																	<?php echo $call_to_action_footer_button; ?>
																</a>
															</div>
														<?php endif; ?>
													</article>
												</div>
											</footer>
										<?php else : ?>
											<?php donate_footer(); ?>
										<?php endif; ?>
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
