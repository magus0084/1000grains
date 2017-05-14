<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );



/************* MENU FILTERS ***********************/
/*
	Filters menu items so that the 'Top Page' and other pages
	don't appear in the menu list when called.
*/

/*
add_filter('wp_nav_menu_items' , 'exclude_menu_items', 10, 2);


function exclude_menu_items($items, $args) {
    // Iterate over the items to search and destroy
	foreach ( $items as $key => $item ) {
		if ( $item->object_title == 'Top Page' ) unset( $items[$key] );
		else if ( $item->object_title == 'Donate' ) unset( $items[$key] );
	}
	return $items;
}
*/

/******* THESE DON'T WORK YET ************/

add_filter('wp_nav_menu_items','add_section_highlights', 10, 2);

function add_section_highlights( $items, $args ) {

    if( $args->theme_location == 'footer-links' && is_single() && $item->title == 'What We Do' ) {
        $items .=
			"<ul>
				<li class='nav-section-highlight'>Physical Wellness</li>
				<li class='nav-section-highlight'>Financial Wellness</li>
				<li class='nav-section-highlight'>Resource Access</li>
			</ul>";
	}
    return $items;
}





/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!





/****************** GET ID BY SLUG *********************/

/* FUNCTION: get_id_by_slug
 * ------------------------
 * Gets the ID of a page by its slug.
 *
 * Usage:
 * get_id_by_slug('any-page-slug');
 */
 
function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}



/****************** SET BACKGROUND IMAGE *********************/

/* FUNCTION: set_background_img
 * ----------------------------
 * This function sets the background image to a page
 * to the 'featured image'.  If no featured image is
 * available, the program defaults to an image from
 * the backgrounds folder.
 */

function set_bg_img() {
	
	// Set a default image
	$img_url = get_template_directory_uri() . '/library/images/backgrounds/cutting-board.jpg';
	
	// Get image if ID is set
	if (isset($bg_img_params['id']) && has_post_thumbnail( $bg_img_params['id'] )) {
		$img_url = wp_get_attachment_url( get_post_thumbnail_id( $bg_img_params['id'] ), 'full' ); 
	} ?>

	<?php // Set background to width of window and height of image ?>
	<style>
		body {
			background-image: url('<?php echo $img_url; ?>');
		}
	</style>
<?php
}

function set_top_bg_img($url1, $url2, $url2, $url3, $url4, $url5) {}



/******************* PROGRAMS LIST **********************/
/* FUNCTION: programs_list
 * -----------------------
 * Sets up the list of programs found on several pages
 * throughout the site.
 */

// Get all children posts of programs page and display them
function programs_list() {
	global $wpdb;
	$programs_top_ID = get_id_by_slug('programs');
	$child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$programs_top_ID." AND post_type = 'page' ORDER BY menu_order", 'OBJECT');

	if ( $child_pages ) : ?>
		<ul class="pure-g list--no-style">
			
	    	<?php foreach ( $child_pages as $pageChild ) :
		        setup_postdata( $pageChild );
				$pageImage = get_template_directory_uri() . '/library/images/backgrounds/cutting-board.jpg';
		
				// Set a default image to pages without a thumbnail
				if ( $pageChild->post_title != 'Our Method') :
		        	if (has_post_thumbnail( $pageChild->ID )) :
						$pageImage = wp_get_attachment_url( get_post_thumbnail_id( $pageChild->ID ), 'medium' );
					endif; ?>
					
			        <li class="link--hasImage pure-u-1-1 pure-u-md-1-2">
			        	<a href="<?php echo get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>">
			            	<div class="page-link-image" style="background-image: url('<?php echo $pageImage; ?>');">
								<div class="page-link-title-container text-align--center valign-middle--parent">
									<h3 class="page-link-title valign-middle--child"><?php echo $pageChild->post_title; ?></h3>
								</div>
							</div>
			        	</a>
			        </li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<?php
}





/******************* DONATE FOOTER **********************/

/* FUNCTION: donate_footer
 * -----------------------
 * Sets up the donate footer that appears on the bottom of
 * many pages on the site.
 */

function donate_footer() { ?>
	<footer class="article-footer cf">
		<div class="wrap text-align--center hasDivider">
			<article class="text-align--center article-footer-default">
				<h4 class="margin-b--xs">Get Involved</h4>
				<p>Support Healthy Lives and Healthy Living</p>
				<div class="margin-t--m">
					<a class="btn--p1 btn--alt margin-r--s" href="<?php echo get_permalink( get_page_by_title( 'Donate' ) ) ?>">Donate</a>
					<a class="btn--p1 btn--alt" href="<?php echo get_permalink( get_page_by_path( 'get-involved/volunteer/' ) ) ?>">Volunteer</a>
				</div>
			</article>
		</div>
		
		<?php 
			/* Comments Template removed for now because comments are not
			 * needed on the site.
			 */
			// comments_template(); 
		?>
	</footer>
<?php
}



/******************* FIXED DONATE FORM **********************/

/* FUNCTION: fixed_donate_form
 * ---------------------------
 * Takes in a an array of a fixed donation amount (int), 
 * form ID (string), and a redirect URL (string) and 
 * creates a paypal donation form with that fixed amount.
 */

function fixed_donate_form($form_parameters) { ?>
	<form id="<?php echo $form_parameters['form_ID']; ?>" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_donations">
		<input type="hidden" name="business" value="B2L3XB5N25D6Q">
		<input type="hidden" name="lc" value="US">
		<input type="hidden" name="item_name" value="1 Grain to 1000 Grains">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="no_note" value="0">
		<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
		<input type="hidden" name="return" value="<?php echo $form_parameters['redirect_URL']; ?>">
		<input type="hidden" name="amount" value="<?php echo $form_parameters['amount']; ?>">
		
		<input type="submit" id="donation-form-amount-1-submit" class="btn--p1 btn--alt" value="Give $<?php echo $form_parameters['amount']; ?>" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
<?php
}



/******************* STAFF PROFILE **********************/

/* FUNCTION: staff_profile
 * -----------------------
 * Takes in an array of user profile information to create
 * the markup for a user profile.  The image parameter is
 * optional as well as the custom class to be applied to the
 * wrapper element.
 *
 * This function is used on the leadership page as well as
 * the board of directors page.
 */

function staff_profile($profile) { 
	
	// Check to see that a name exists (therefore a profile exists)
	if (!empty($profile['name'])) :
		
		// Check to see if the divider parameter is set
		if (isset($profile['has_divider']) && $profile['has_divider'] == true) : ?>
			<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 hasDivider margin-b--xl"></div>
		<?php endif; ?>
		
		<article class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-1-2 <?php if (isset($profile['custom_class'])) : echo $profile['custom_class']; endif; ?> margin-b--xl profile profile--staff">
			<header class="profile-header">
				<?php if (isset($profile['img_url'])) : ?>
					<img class="img--round" alt="<?php echo $profile['name'] ?>" src="<?php echo $profile['img_url'] ?>" />
				<?php endif; ?>
				<h2><?php echo $profile['name'] ?></h2>
				<p><?php echo $profile['title'] ?></p>
			</header>
			<p class="profile-text">
				<?php echo $profile['profile_text'] ?>
			</p>
		</article>
	<?php endif; ?>
<?php
}




/******************* PARTNER PROFILE **********************/

/* FUNCTION: partner_profile
 * -----------------------
 * Takes in an array of partner profile information to create
 * the markup for a partner profile.  The image parameter is
 * optional as well as the custom class to be applied to the
 * wrapper element.
 *
 * This function is used on the partners page.
 */

function partner_profile($profile) { 
	
	// Check to see that a name exists (therefore a profile exists)
	if (!empty($profile['name'])) :
		
		// Check to see if the divider parameter is set
		if (isset($profile['has_divider']) && $profile['has_divider'] == true) : ?>
			<div class="pure-u-1-1 pure-u-md-1-2 hasDivider margin-b--xl"></div>
		<?php endif; ?>
		
		<article class="pure-u-1-1 pure-u-md-1-2 <?php if (isset($profile['custom_class'])) : echo $profile['custom_class']; endif; ?> padding--m margin-b--xl profile profile--partner">
			<header class="profile-header">
				<?php if (!empty($profile['img_url'])) : ?>
					<img class="profile-image" alt="<?php echo $profile['name'] ?>" src="<?php echo $profile['img_url'] ?>" />
				<?php endif; ?>
				<h4>
					<?php if (isset($profile['website_url'])) : ?>
						<a href="<?php echo $profile['website_url'] ?>" class="profile link" title="Visit partner website" target="_blank">
							<?php echo $profile['name'] ?>
						</a>
					<?php else : ?>
						<?php echo $profile['name'] ?>
					<?php endif; ?>
				</h4>
				<?php if (isset($profile['title'])) : ?>
					<p><?php echo $profile['title'] ?></p>
				<?php endif; ?>
			</header>
			<p class="profile-text">
				<?php echo $profile['profile_text'] ?>
			</p>
		</article>
	<?php endif; ?>
<?php
}





/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
  wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');

// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );

/* DON'T DELETE THIS CLOSING TAG */ ?>
