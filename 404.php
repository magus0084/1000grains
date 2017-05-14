<?php get_header(); ?>
<?php set_bg_img(null); ?>

			<div id="content">

				<div id="inner-content" class="cf">

					<main id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header text-align--center content-header">
								<div class="wrap">
									<h1 class="page-title" itemprop="headline"><?php _e( '404 Error - Article Not Found', 'bonestheme' ); ?></h1>
								</div>
							</header> <?php // end article header ?>

							<div class="article-content-wrapper">
								<section class="entry-content cf margin-b--l">
									<div class="wrap text-align--center">
										<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--left">
											<?php _e( 'The article you were looking for was unfortunately not found. Try returning home or using the header navigation to find what you are looking for.', 'bonestheme' ); ?>
										</div>
									</div>
								</section> <?php // end article section ?>
								
								<section class="margin-b--xl text-align--center">
									<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2">
										<a class="btn--p1" href="<?php echo home_url(); ?>">Return to 1000 Grains Home</a>
									</div>
								</section>
							
							
								<?php /***  NOT USING SEARCH FORM FOR NOW
								<section class="margin-b--xl search">
									<div class="wrap text-align--center">
										<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 text-align--left">
											<p><?php get_search_form(); ?></p>
										</div>
									</div>
								</section>
								*/ ?>

								<?php donate_footer(); ?>
							</div>
						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
