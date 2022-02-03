<?php
if (! function_exists('avp_setup')) :

function my_login_logo() { ?>
<style type="text/css">
    #login h1 a,
    .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri();?>/imgs/avp-logo.png);
        height: 64px;
        width: 320px;
        background-size: 320px 65px;
        background-repeat: no-repeat;
        background-size: contain;
        padding-bottom: 30px;
    }

</style>
<?php }

//add_action('login_enqueue_scripts', 'my_login_logo');

//////////////////////////////////////////////////////////////
// REPLACE DASHBOARD
//////////////////////////////////////////////////////////////

function avp_dashboard_redirect() {
    echo "<script>window.location.href = '".admin_url('admin.php?page=avp_prix_page')."';</script>";
    //return admin_url('admin.php?page=avp_prix_page');
}
add_action('wp_dashboard_setup', 'avp_dashboard_redirect');

function avp_login_redirect($redirect_to, $request, $user) {
    return admin_url('admin.php?page=avp_prix_page');
}
add_filter('login_redirect', 'avp_login_redirect', 10, 3);

/************************************************************/
/*** RENAME ADMIN MENU ITEMS ********************************/
/************************************************************/

/*function wd_admin_menu_rename() {
     global $menu; // Global to get menu array
     $menu[5][0] = 'Portfolio'; // Change name of posts to portfolio
}
add_action( 'admin_menu', 'wd_admin_menu_rename' );*/


/************************************************************/
/*** ADD MENU POSITIONS IN WORDPRESS TOP MENU ***************/
/************************************************************/

function add_sumtips_admin_bar_link() {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() )
        return;

    $wp_admin_bar->add_menu( array(
        'title'     => __("Page d'accueil"),
        'href'      => __(get_home_url())
    ));

    $wp_admin_bar->add_menu( array(
        'title'     => __("Backoffice"),
        'href'      => __(admin_url('admin.php?page=avp_prix_page'))
    ));

}
add_action('admin_bar_menu', 'add_sumtips_admin_bar_link', 25);

/************************************************************/
/*** REMOVE UNNECCESSARY WORDPRESS ELEMENTS *****************/
/************************************************************/

function remove_admin_bar_elements() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');		      // Remove the WordPress logo
    $wp_admin_bar->remove_menu('about');		      // Remove the about WordPress link
    $wp_admin_bar->remove_menu('wporg');		      // Remove the WordPress.org link
    $wp_admin_bar->remove_menu('documentation');      // Remove the WordPress documentation
    $wp_admin_bar->remove_menu('support-forums');     // Remove the support forums link
    $wp_admin_bar->remove_menu('feedback');		      // Remove the feedback link	
    $wp_admin_bar->remove_menu('view-site');	      // Remove the view site link
    $wp_admin_bar->remove_menu('comments');		      // Remove the comments link
    $wp_admin_bar->remove_menu('customize');	      // Remove customizer link
    $wp_admin_bar->remove_menu('edit');			      // Remove edit page link
    $wp_admin_bar->remove_menu('view');			      // Remove current page view on website
    $wp_admin_bar->remove_menu('search');		      // Remove search bar
    $wp_admin_bar->remove_menu('dashboard');	      // Remove dashboard
    $wp_admin_bar->remove_menu('new-content');		  // Remove the content link
    $wp_admin_bar->remove_menu('updates');		      // Remove the updates link
    $wp_admin_bar->remove_menu('themes');		      // Remove themes button under site name
    $wp_admin_bar->remove_menu('widgets');		      // Remove widgets button under site name
    $wp_admin_bar->remove_menu('menus');		      // Remove menus button under site name
    /////////////////////////////
    //$wp_admin_bar->remove_menu('site-name');			// Remove the site name menu
    //$wp_admin_bar->remove_menu('my-account');			// Remove the user details tab
    //$wp_admin_bar->remove_menu('delete-cache');		// Remove WP Supercache Delete Cache link
    //$wp_admin_bar->remove_menu('updraft_admin_node');	// Remove Updraft plugin link
    //$wp_admin_bar->remove_menu('w3tc');				// Remove W3 total cache plugin link
}
add_action('wp_before_admin_bar_render', 'remove_admin_bar_elements'); 

function remove_admin_menu_elements() {
    remove_menu_page('index.php');                    //Dashboard
    remove_menu_page('edit.php');                     //Posts
    remove_menu_page('upload.php');                   //Media
    remove_menu_page('edit-comments.php');            //Comments
    remove_menu_page('tools.php');                    //Tools

    $roles = wp_get_current_user()->roles;
    if(in_array('editor', $roles)) {
        //return;
        remove_menu_page('themes.php');
        remove_menu_page('plugins.php');
        remove_menu_page('users.php');
        remove_menu_page('profile.php');
        remove_menu_page('options-general.php');
        remove_menu_page('duplicator');
    }
    remove_menu_page('edit.php?post_type=page');    //Pages
    //remove_menu_page('themes.php');                 //Appearance
    //remove_menu_page('plugins.php');                //Plugins
    //remove_menu_page('users.php');                  //Users
    //remove_menu_page('profile.php');                //Users
    //remove_menu_page('options-general.php');        //Settings
    //remove_menu_page('jetpack');                    //Jetpack* 
    //remove_menu_page('duplicator');                 //Duplicator
}
add_action('admin_menu', 'remove_admin_menu_elements');

/*******************************/

//function wpforo_search_form($html) {
//$html = str_replace('placeholder="Search ', 'placeholder="Nom du projet ', $html);
//return $html;
//}
//add_filter('get_search_form', 'wpforo_search_form');

/*******************************/

function my_login_stylesheet() {
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/css/style-login.css');
}
add_action('login_enqueue_scripts', 'my_login_stylesheet');

function my_login_logo_url() { return 'http://atelier-vert-pomme.com'; }
add_filter('login_headerurl', 'my_login_logo_url');
function my_login_logo_url_title() { return 'Atelier Vert Pomme'; }
add_filter('login_headertitle', 'my_login_logo_url_title');

function arphabet_widgets_init() {

    register_sidebar(array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ));

}
//add_action('widgets_init', 'arphabet_widgets_init');

add_action('admin_head', 'custom_admin_css');

function custom_admin_css() { ?>
<style>

    .toplevel_page_avp_instructions_page, .toplevel_page_avp_emails_page {
        display: none !important;
    }
    
    .c-action, .add-row {
        display: none !important;
    }
    
</style>
<?php }

function wp_get_menu_array($current_menu) {
 
    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID']      =   $m->ID;
            $menu[$m->ID]['title']       =   $m->title;
            $menu[$m->ID]['url']         =   $m->url;
            $menu[$m->ID]['children']    =   array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID']       =   $m->ID;
            $submenu[$m->ID]['title']    =   $m->title;
            $submenu[$m->ID]['url']  =   $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
     
}

function wpb_custom_new_menu() {
    register_nav_menu('main-menu',__('Main Menu'));
    //register_nav_menu('acc-menu',__('Accueil menu'));
    //register_nav_menu('left-menu',__('LEFT MENU'));
    //register_nav_menu('right-menu',__('RIGHT MENU'));
}
add_action('init', 'wpb_custom_new_menu');

function avp_setup() {
    load_theme_textdomain('avp', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'menu-1' => esc_html__('Primary', 'avp'),
    ));

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support('custom-background', apply_filters('avp_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));

    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-logo');
}
endif;
add_action('after_setup_theme', 'avp_setup');

function avp_content_width() {
    $GLOBALS['content_width'] = apply_filters('avp_content_width', 640);
}
add_action('after_setup_theme', 'avp_content_width', 0);

function avp_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'avp'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'avp'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'avp_widgets_init');

function avp_scripts() {
    // wp_enqueue_style('avp-flexboxgrid', get_template_directory_uri() . '/css/flexboxgrid.min.css');
    // wp_enqueue_style('avp-style', get_stylesheet_uri());
    // wp_enqueue_script('avp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    //  wp_enqueue_script('avp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'avp_scripts');

//require get_template_directory() . '/inc/template-tags.php';
//require get_template_directory() . '/inc/extras.php';
//require get_template_directory() . '/inc/customizer.php';
//require get_template_directory() . '/inc/jetpack.php';