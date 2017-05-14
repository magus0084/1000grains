<?php
/*
 Template Name: Staff Profile Page
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
									<section class="entry-content cf margin-b--xl" itemprop="articleBody">
										<div class="wrap text-align--center">
											<?php staff_profile(array(
												'name' => get_field('member_name'),
												'title' => get_field('member_title'),
												'profile_text' => get_field('member_profile'),
												'custom_class' =>'text-align--left'
											)); ?>
											
											<?php staff_profile(array(
												'name' => get_field('member_name_2'),
												'title' => get_field('member_title_2'),
												'profile_text' => get_field('member_profile_2'),
												'custom_class' =>'text-align--left',
												'has_divider' => true
											)); ?>

											<?php staff_profile(array(
												'name' => get_field('member_name_3'),
												'title' => get_field('member_title_3'),
												'profile_text' => get_field('member_profile_3'),
												'custom_class' =>'text-align--left',
												'has_divider' => true
											)); ?>
												
											<?php staff_profile(array(
												'name' => get_field('member_name_4'),
												'title' => get_field('member_title_4'),
												'profile_text' => get_field('member_profile_4'),
												'custom_class' =>'text-align--left',
												'has_divider' => true
											)); ?>
											
											<?php staff_profile(array(
												'name' => get_field('member_name_5'),
												'title' => get_field('member_title_5'),
												'profile_text' => get_field('member_profile_5'),
												'custom_class' =>'text-align--left',
												'has_divider' => true
											)); ?>
											
											<?php staff_profile(array(
												'name' => get_field('member_name_6'),
												'title' => get_field('member_title_6'),
												'profile_text' => get_field('member_profile_6'),
												'custom_class' =>'text-align--left',
												'has_divider' => true
											)); ?>
											
											<?php staff_profile(array(
												'name' => get_field('member_name_7'),
												'title' => get_field('member_title_7'),
												'profile_text' => get_field('member_profile_7'),
												'custom_class' =>'text-align--left',
												'has_divider' => true
											)); ?>
											
											<?php staff_profile(array(
												'name' => get_field('member_name_8'),
												'title' => get_field('member_title_8'),
												'profile_text' => get_field('member_profile_8'),
												'custom_class' =>'text-align--left',
												'has_divider' => true
											)); ?>
											
											<?php staff_profile(array(
												'name' => get_field('member_name_9'),
												'title' => get_field('member_title_9'),
												'profile_text' => get_field('member_profile_9'),
												'custom_class' =>'text-align--left',
												'has_divider' => true
											)); ?>
											
											<?php staff_profile(array(
												'name' => get_field('member_name_10'),
												'title' => get_field('member_title_10'),
												'profile_text' => get_field('member_profile_10'),
												'custom_class' =>'text-align--left',
												'has_divider' => true
											)); ?>
										</div>
									</section> <?php // end article section ?>

									<?php
									 	$call_to_action_content = get_field('call_to_action_content'); 
										
										if (!empty($call_to_action_content)) : ?>
											<footer class="article-footer cf padding--l">
												<div class="wrap text-align--center hasDivider">
													<article>
														<?php echo $call_to_action_content; ?>
														
														<?php 
															$call_to_action_button = get_field('call_to_action_button'); 
															if (!empty($call_to_action_button)) : ?>
															<div class="margin-t--m">
																<a class="btn--p1" href="<?php echo get_field('call_to_action_button_link'); ?>">
																	<?php echo $call_to_action_button; ?>
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
