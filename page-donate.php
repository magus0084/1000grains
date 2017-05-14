<?php
/*
 Template Name: Donate Page
 *
 * Template for the donate page.
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
									<div class="wrap">
										<div class="pure-u-1-1 pure-u-sm-2-3 pure-u-md-1-2 pure-u-lg-1-3 overlay-content donate-box margin-t--m">
											<p>
												<?php // Donation Box Content
													echo get_field('donation_box_content'); 
												?>
											</p>
											<form class="margin-t--m" id="donation-form" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
												<input type="hidden" name="cmd" value="_donations">
												<input type="hidden" name="business" value="B2L3XB5N25D6Q">
												<input type="hidden" name="lc" value="US">
												<input type="hidden" name="item_name" value="1 Grain to 1000 Grains">
												<input type="hidden" name="currency_code" value="USD">
												<input type="hidden" name="no_note" value="0">
												<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
												<input type="hidden" name="return" value="<?php echo get_field('donation_redirect_page'); ?>">
												
												<div id="amount" class="pure-u-1-1">
													<span class="preinput-content">$</span>
													<input type="number" 
														name="amount" 
														placeholder="<?php echo get_field('donation_amount_1_title'); ?>.00" 
														value="<?php echo get_field('donation_amount_1_title'); ?>.00" 
														maxlength="9" 
														max="50000" 
														min="1.0" 
														step="0.01" 
														required="required">
													<span class="postinput-content">USD</span>
												</div>
												
												<input type="submit" id="donation-form-submit" class="btn--p1 btn--alt margin-t--m" value="Give by PayPal" name="submit" alt="PayPal - The safer, easier way to pay online!">
												<p class="submit-note margin-t--sm">1 Grain to 1000 Grains is a 501(c)(3)</p>
												<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
											</form>

											<?php /*
											<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
												<input type="hidden" name="cmd" value="_donations">
												<input type="hidden" name="business" value="ken@1000grains.org">
												<input type="hidden" name="lc" value="US">
												<input type="hidden" name="item_name" value="1 Grain to 1000 Grains">
												<input type="hidden" name="no_note" value="0">
												<input type="hidden" name="currency_code" value="USD">
												<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
												<input type="submit" class="btn--p1 btn--alt" value="Give via Paypal" name="submit" alt="PayPal - The safer, easier way to pay online!">
												<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
											</form> */ ?>
											
										</div>
									</div>
								</header> <?php // end article header ?>

								<div class="article-content-wrapper">
									
									<section class="entry-content cf margin-b--m"> 
										<div class="wrap text-align--center">
											<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 hasDivider--special">
												<h2 class="margin-t--m">
													<?php // Content Area Title
														echo get_field('content_area_1_title'); 
													?>
												</h2>
												<div class="margin-t--m">
													<p class="margin-t--m">
													<?php // Content Area Text
														echo get_field('content_area_1_text'); 
													?>
													</p>
												</div>
											</div>
										</div>
									</section> <?php // end Content Area Section ?>
									
									<section itemprop="articleBody">
										<ul class="wrap pure-g donation-amounts text-align--center">
											<li class="pure-u-1-1 pure-u-md-7-24 text-align--left donation-amount">
												<article class="donation-amount-content">
													<h2 class="text-align--center">
														<span class="donation-currency-sign">&#36;</span><?php 
															// Donation Amount 1 
															echo get_field('donation_amount_1_title'); 
														?></h2>
													<p>
														<?php // Donation Amount 1 Text
															echo get_field('donation_amount_1_text'); 
														?>
													</p>
													
													<div class="box-button text-align--center">
														<?php // Donation Form
															fixed_donate_form(array(
																'form_ID' => 'donation-form-amount-1',
																'redirect_URL' => get_field('donation_redirect_page'),
																'amount' => get_field('donation_amount_1_title'))
															);
														?>
													</div>
												</article>
											</li>
											
											<li class="pure-u-1-1 pure-u-md-7-24 text-align--left donation-amount">
												<article class="donation-amount-content">
													<h2 class="text-align--center"><span class="donation-currency-sign">&#36;</span><?php 
															// Donation Amount 2 
															echo get_field('donation_amount_2_title'); 
														?></h2>
													<p>
														<?php // Donation Amount 2 Text
															echo get_field('donation_amount_2_text'); 
														?>
													</p>
													
													<div class="box-button text-align--center">
														<?php // Donation Form
															fixed_donate_form(array(
																'form_ID' => 'donation-form-amount-2',
																'redirect_URL' => get_field('donation_redirect_page'),
																'amount' => get_field('donation_amount_2_title'))
															);
														?>
													</div>
												</article>
											</li>
											
											<li class="pure-u-1-1 pure-u-md-7-24 text-align--left donation-amount last">
												<article class="donation-amount-content">
													<h2 class="text-align--center"><span class="donation-currency-sign">&#36;</span><?php 
															// Donation Amount 3 
															echo get_field('donation_amount_3_title'); 
														?></h2>
													<p>
														<?php // Donation Amount 3 Text
															echo get_field('donation_amount_3_text'); 
														?>
													</p>
													
													<div class="box-button text-align--center">
														<?php // Donation Form
															fixed_donate_form(array(
																'form_ID' => 'donation-form-amount-3',
																'redirect_URL' => get_field('donation_redirect_page'),
																'amount' => get_field('donation_amount_3_title'))
															);
														?>
													</div>
												</article>
											</li>
										</ul>
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
												<p><?php _e( 'This is the error message in the page.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				</div>

			</div>

<?php get_footer(); ?>
