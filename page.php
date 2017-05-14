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
											
											<?php // Check if there is an excerpt and display it
												if ( has_excerpt(get_the_ID()) ) : ?>
													<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--left article-content-excerpt">
														<?php the_excerpt(); ?>
													</div>
													
													<div class="hasDivider margin-t--s margin-b--s"></div>
											<?php endif; ?>
											
											<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--left">
												<?php
													// the content (pretty self explanatory huh)
													the_content();
												?>
											</div>
										</div>
									</section> <?php // end article section ?>
									
									<?php if (!get_field('hide_donation_footer')) : ?>
										<?php donate_footer(); ?>
									<?php else : ?>
										<footer class="article-footer cf margin-t--m">
											<?php // Filler Footer ?>
										</footer>
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
