<?php
/*
 Template Name: Leadership Page
 *
 * Template for the leadership page.  Uses the advanced custom fields (ACF)
 * plugin for custom editing of content and adding profiles.  The current
 * implementation supports a limited number of profiles.
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
												'img_url' => get_field('staff_picture'),
												'name' => get_field('staff_name'),
												'title' => get_field('staff_title'),
												'profile_text' => get_field('staff_profile'),
												'custom_class' =>'text-align--center'
												)); ?>
												
											<?php staff_profile(array(
												'img_url' => get_field('staff_picture_2'),
												'name' => get_field('staff_name_2'),
												'title' => get_field('staff_title_2'),
												'profile_text' => get_field('staff_profile_2'),
												'custom_class' =>'text-align--center',
												'has_divider' => true
												)); ?>
												
											<?php staff_profile(array(
												'img_url' => get_field('staff_picture_3'),
												'name' => get_field('staff_name_3'),
												'title' => get_field('staff_title_3'),
												'profile_text' => get_field('staff_profile_3'),
												'custom_class' =>'text-align--center',
												'has_divider' => true
												)); ?>
												
											<?php staff_profile(array(
												'img_url' => get_field('staff_picture_4'),
												'name' => get_field('staff_name_4'),
												'title' => get_field('staff_title_4'),
												'profile_text' => get_field('staff_profile_4'),
												'custom_class' =>'text-align--center',
												'has_divider' => true
												)); ?>
										</div>
									</section> <?php // end article section ?>

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
