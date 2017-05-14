			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				
				<div id="inner-footer" class="wrap cf">
					<header id="footer-top" class="text-align--center margin-t--l">
						<a href="<?php echo home_url(); ?>" rel="nofollow">
							<picture>
								<source
									srcset="<?php bloginfo('template_directory'); ?>/library/images/logo/logo-full.png,
										<?php bloginfo('template_directory'); ?>/library/images/logo/logo-full@2x.png 2x">
								<img
									srcset="<?php bloginfo('template_directory'); ?>/library/images/logo/logo-full.png,
										<?php bloginfo('template_directory'); ?>/library/images/logo/logo-full@2x.png 2x"
									src="<?php bloginfo('template_directory'); ?>/library/images/logo/logo-full.png"
									alt="1 Grain to 1000 Grains">
							</picture>
						</a>
						<!--<h1 class="site-logo--full"><?php bloginfo('name'); ?></h1> -->
						<p class="site-tagline"><?php bloginfo('description'); ?></p>
					</header>
					
					<nav id="footer-body" class="margin-t--l" role="navigation">
						<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-nav cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					//'before' => '',                                 // before the menu
    					//'after' => '',                                  // after the menu
    					//'link_before' => '',                            // before each link
    					//'link_after' => '',                             // after each link
    					'depth' => 3                                   // limit the depth of the nav
    					//'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<footer id="footer-bottom" class="pure-g hasDivider margin-t--m">
						<p class="footer-bottom-creator pure-u-1-1 pure-u-md-1-3 text-align--center text-align-md--left">
							Site design and craftsmanship by <a href="mailto:adam.toda@gmail.com" title="Get in touch with the creator">Adam Toda</a>
						</p>
						<ul class="footer-bottom-copyright horizontal-list pure-u-1-1 pure-u-md-2-3 text-align--center text-align-md--right">
							<li>1 Grain to 1000 Grains is a 501(c)(3)</li>
							<li class="margin-l--s">&middot;</li>
							<li class="margin-l--s source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></li>
							<li class="margin-l--s">&middot;</li>
							<li><a class="hasAccent margin-l--s" title="Contact us" href="mailto:info@1000grains.org<?php // echo get_bloginfo('admin_email'); ?>">info@1000grains.org<?php // echo get_bloginfo('admin_email'); ?></a></li>
						</ul>
					</footer>
				</div>
			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
