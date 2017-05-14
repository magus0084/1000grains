<?php
/*
 Template Name: Top Page
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
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<style>			
				.background-1 {
					background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/cutting-board.jpg');
				}
				
				.background-2 {
					background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/program-awards-group.jpg');
				}
				
				.background-3 {
					background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/kitchen-help.jpg');
				}
				
				.background-4 {
					background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/teaching-kids.jpg');
				}
				
				.background-5 {
					background-image: url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/mixing-vegetables.jpg');
				}
				
				body:after {
				    display:none;
				    content: url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/cutting-board.jpg') 
						url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/program-awards-group.jpg') 
						url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/kitchen-help.jpg') 
						url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/teaching-kids.jpg') 
						url('<?php echo get_template_directory_uri(); ?>/library/images/backgrounds/mixing-vegetables.jpg');
				}
			</style>
			
			<article class="text-align--center content-header valign-middle--parent full-screen">
				<div class="wrap valign-middle--child margin-t--l">
					<picture>
						<source
							srcset="<?php echo get_template_directory_uri(); ?>/library/images/logo/logo-full.png,
								<?php echo get_template_directory_uri(); ?>/library/images/logo/logo-full@2x.png 2x">
						<img
							srcset="<?php echo get_template_directory_uri(); ?>/library/images/logo/logo-full.png,
								<?php echo get_template_directory_uri(); ?>/library/images/logo/logo-full@2x.png 2x"
							src="<?php echo get_template_directory_uri(); ?>/library/images/logo/logo-full.png"
							alt="1 Grain to 1000 Grains">
					</picture>

					<p class="site-tagline">
						<?php bloginfo('description'); ?>
					</p>
				
					<nav class="margin-t--m">
						<a class="btn--p1" href="#introductionPoints">See How</a>
					</nav>
				</div>
			</article>

			<article class="content-body cf article-content-wrapper" itemprop="articleBody">
				<div class="wrap pure-g text-align--center">
					<header class="pure-u-4-5 pure-u-md-1-2 center-element">
						<?php 
							$content_intro_title = get_field('content_intro_title');
							if (!empty($content_intro_title)) : ?>
								<h1><?php echo $content_intro_title; ?></h1>
						<?php endif; ?>
						
						<?php 
							$content_intro_text = get_field('content_intro_text');
							if (!empty($content_intro_text)) : ?>
							<p>
								<?php echo $content_intro_text; ?>
							</p>
						<?php endif; ?>
					</header>
					
					<section class="pure-u-1-1 margin-t--xl top-page-points">
						<article>
							<?php // Content Area 1 ?>
							<section id="introductionPoints" class="pure-g top-page-point">
								<div class="pure-u-1-1 pure-u-md-1-2 padding--l text-align--left">
									<h2><?php echo get_field('content_area_1_title'); ?></h2>
									<p>
										<?php echo get_field('content_area_1_text'); ?>
									</p>
								</div>
								<figure class="pure-u-1-1 pure-u-md-1-2">
									<img class="shadow--l" src="<?php echo get_field('content_area_1_image'); ?>" alt="<?php echo get_field('content_area_1_title'); ?>">
								</figure>
							</section>
							
							<?php // Content Area 2 ?>
							<section class="pure-g top-page-point">
								<div class="pure-u-1-1 pure-u-md-1-2 padding--l text-align--left">
									<h2><?php echo get_field('content_area_2_title'); ?></h2>
									<p>
										<?php echo get_field('content_area_2_text'); ?>
									</p>
								</div>
								<figure class="pure-u-1-1 pure-u-md-1-2">
									<img class="shadow--l" src="<?php echo get_field('content_area_2_image'); ?>" alt="<?php echo get_field('content_area_2_title'); ?>">
								</figure>
							</section>
						
							<?php // Content Area 3 ?>
							<section class="pure-g top-page-point">
								<div class="pure-u-1-1 pure-u-md-1-2 padding--l text-align--left">
									<h2><?php echo get_field('content_area_3_title'); ?></h2>
									<p>
										<?php echo get_field('content_area_3_text'); ?>
									</p>
								</div>
								<figure class="pure-u-1-1 pure-u-md-1-2">
									<img class="shadow--l" src="<?php echo get_field('content_area_3_image'); ?>" alt="<?php echo get_field('content_area_3_title'); ?>">
								</figure>
							</section>

							<?php // Final Call to Action ?>
							<section class="margin-b--xl"> 
								<div class="wrap text-align--center">
									<article class="content-paragraph pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2">
										<h2 class="margin-t--m"><?php echo get_field('content_area_4_title'); ?></h2>
										<div class="margin-t--m margin-b--m">
											<?php // Content Area Text
												echo get_field('content_area_4_text'); 
											?>
										</div>

										<nav class="margin-t--xxl margin-b--xxl">
											<a class="btn--p1" href="<?php echo get_permalink( get_page_by_path( 'what-we-do' ) ); ?>">Learn More</a>
										</nav>
									</article>
								</div>
							</section> <?php // end Content Area Section ?>
						</article>
					</section>

					<section>

					</section>
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
								<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
						</footer>
					</article>

			<?php endif; ?>

<?php get_footer(); ?>
