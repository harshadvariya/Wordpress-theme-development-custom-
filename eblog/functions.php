<?php
/**
 * E Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package E_Blog
 */

if ( ! function_exists( 'eblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function eblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on E Blog, use a find and replace
		 * to change 'eblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'eblog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'slider-image', 900, 400 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'eblog' ),
			'header' => esc_html__( 'header top', 'eblog' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'eblog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'eblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eblog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'eblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'eblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'eblog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'eblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'footer widget 1', 'eblog' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'eblog' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'footer widget 2', 'eblog' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'eblog' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'footer widget 3', 'eblog' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'eblog' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'eblog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eblog_scripts() {
	
	wp_deregister_script('jquery');

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js' );

	wp_enqueue_style( 'eblog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'eblog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'eblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Bootstrap CSS & JS Files
	wp_enqueue_style('eblog-bootstrap', get_template_directory_uri() . '/bootstrap/bootstrap.min.css');

	wp_enqueue_script( 'eblog-bootstrap-js', get_template_directory_uri() . '/bootstrap/bootstrap.min.js', array(), '', true );
	
	wp_enqueue_style('eblog-fontawesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');

	// Slippry Slider
	wp_enqueue_style('eblog-slippry-css', get_template_directory_uri() . '/css/slippry.css');

	wp_enqueue_script( 'eblog-slippry-js', get_template_directory_uri() . '/js/slippry.min.js' );

}
add_action( 'wp_enqueue_scripts', 'eblog_scripts' );

// Changing excerpt more
function new_excerpt_more($more) {
   global $post;
   return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
   }
 add_filter('excerpt_more', 'new_excerpt_more');

/**
 * theme Settings Panel
 */
// require get_template_directory() . '/admin/admin-init.php';

/**
 * Custom Post Type Slider.
 */
require get_template_directory() . '/inc/slider-post-type.php';

/**
 * Custom Post Type Portfolio.
 */
require get_template_directory() . '/inc/portfolio-post-type.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory(). '/inc/kirki/kirki.php';
require get_template_directory(). '/inc/kirki-config.php';


/* ============== Custom post metabox on portfolio page ============== */
add_action('admin_init', 'custom_metabox');
function custom_metabox(){
	add_meta_box(
		'custom_metabox_id', // metabox Id
	 	'Custom Metabox Name', // metabox name
	 	'custom_metabox_field', // custom field which is you added below
	 	'portfolio', // post, page types
	 	'normal', // normal code editor
	 	'high' // priority (high, low)
	 );
}

// Added Custom Field in this function
function custom_metabox_field(){
	global $post;
	$data = get_post_custom($post->ID);
	$val = isset($data['custom_input']) ? esc_attr($data['custom_input'][0]) : 'no value';
	?>
	<lable>Author </lable>
	<input type="text" name="custom_input" id="custom_input" value="<?php echo $val; ?>" />
<?php }

// After This Code You can see it on portfolio post type on wp-admin

// Save the custom field input data
add_action('save_post', 'save_detail');
function save_detail(){
	global $post;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post->ID;
	}

	update_post_meta($post->ID, 'custom_input', $_POST['custom_input']);

}

// If you want to show using Shortcode then run below code and add shortcode on page
function show_front_side(){
	$custom_post_type = get_post_meta($post->ID, 'custom_input', true);
	echo $custom_post_type;
}
add_shortcode('show_data','show_front_side');


//Load More Using AJAX On Blog Page
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback() {
	check_ajax_referer('load_more_posts', 'security');
	$paged = $_POST['page'];
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '2',
		'paged' => $paged,
	);
	$my_posts = new WP_Query( $args );
	if ( $my_posts->have_posts() ) :
		?>
		<?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
			<h2><?php the_title() ?></h2>
			<?php the_post_thumbnail( ); ?>
			<?php the_excerpt() ?>
		<?php endwhile ?>
		<?php
	endif;

	wp_die();
}

//Upload Image Using Ajax
function upload_file_ajax(){

 $user_id = $_POST['user_id'];

 if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "" ){
 	//Using For video Upload
 	  $fileType = $_FILES['file']['type'];
 	  $fileSize = $_FILES['file']['size'];
 	  $explodeType = explode('/', $fileType);
 	  $videoExtension = array("webm", "mp4", "mkv");
 	  $validVideoExt = $explodeType[1];
	  if($explodeType[0] == 'video'){
	  		if($fileSize <= 50908994){ //50,908,994 Bytes = 48.5506 Megabytes
	  			if(in_array($validVideoExt, $videoExtension)){
	  				$vextend = explode('.', $_FILES["file"]["name"]);
					$vextension = end($vextend);
					$vfile_extension = strtolower($vextension);
					$new_video_name = $vextend[0] . '_' . mt_rand(10,1000) . '.' . $vfile_extension;
	    			$vtarget_path = get_stylesheet_directory() . "/gallery/videos/";
	    			if(move_uploaded_file($_FILES['file']['tmp_name'], $vtarget_path . $new_video_name)) {
						global $wpdb;
						$insertData = $wpdb->insert('upload_files', array(
					        'user_id' => $user_id,
					        'videos' => $new_video_name,
					        'type' => $fileType,
					        )
				        );
					}
	  			}else{
	  				echo "Video File Format Is not Supported!";
	  			}
	  		}else{
	  			echo "Your Video File Size is too Large!";
	  		}

	  }else{
	  	echo "Video Not Suported";
	  }
	  //End using For video Upload

 		$fileType = $_FILES['file']['type'];
 		$fileSize = $_FILES['file']['size'];
 		$validextensions = array("jpeg", "jpg", "png"); 
		$extend = explode('.', $_FILES["file"]["name"]);
		$extension = end($extend);
		$file_extension = strtolower($extension);

		$new_img_name = $extend[0] . '_' . md5(uniqid()) . '.' . $file_extension;
		$tempname = $_FILES["file"]["tmp_name"];
	    $target_path = get_stylesheet_directory() . "/gallery/images/";


	  //Using For Image Upload
	 if(in_array($extension, $validextensions)) {
			if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path . $new_img_name)) {
				global $wpdb;
				$insertData = $wpdb->insert('upload_files', array(
			        'user_id' => $user_id,
			        'photos' => $new_img_name,
			        'type' => $fileType,
			        )
		        );
			}
		}
	 //End using For Image Upload

	}
  exit();
}
add_action('wp_ajax_upload_file_ajax', 'upload_file_ajax');
add_action('wp_ajax_nopriv_upload_file_ajax', 'upload_file_ajax');




