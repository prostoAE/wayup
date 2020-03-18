<?php
/**
 * Wayup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wayup
 */

if (!function_exists('wayup_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function wayup_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Wayup, use a find and replace
     * to change 'wayup' to the name of your theme in all the template files.
     */
    load_theme_textdomain('wayup', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      'menu-header' => esc_html__('Header Navigation', 'wayup'),
      'menu-footer-1' => esc_html__('Footer Navigation 1', 'wayup'),
      'menu-footer-2' => esc_html__('Footer Navigation 2', 'wayup'),
      'menu-lanquage' => esc_html__('Lanquage Switcher', 'wayup')
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('wayup_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support('custom-logo', array(
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true,
    ));

    //Размеры для картинок
    add_image_size('testimonial-thumb', 225, 231, true);
    add_image_size('testimonial-vertical', 225, 332, true);
    add_image_size('feature-thumb', 438, 455, true);
    add_image_size('news-thumb', 733, 476, true);
  }
endif;
add_action('after_setup_theme', 'wayup_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wayup_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('wayup_content_width', 640);
}

add_action('after_setup_theme', 'wayup_content_width', 0);

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
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}


/*Наш код ниже*/

/**
 * Настройки для option panel
 */
require get_template_directory() . '/inc/options-panel-redux.php';

/**
 * Подключение WooCommerce шаблона
 */
require get_template_directory() . '/inc/functions/woo.php';

/**
 * Подключение скрипта хлебных крошек
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Подключение скрипта Metaboxes
 */
require get_template_directory() . '/inc/metaboxes/metaboxes.php';
require get_template_directory() . '/inc/metaboxes/register_metabox.php';

/**
 * Подключение скрипта Social share
 */
require get_template_directory() . '/inc/social.php';
require get_template_directory() . '/inc/functions/contact.php';

/**
 * Подключение wpBakery
 */
require get_template_directory() . '/inc/functions/wpbakery.php';

/**
 * Подключение Widgets
 */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-about.php';
require get_template_directory() . '/inc/widgets/widget-customcategory.php';
require get_template_directory() . '/inc/widgets/widget-subscribe.php';
require get_template_directory() . '/inc/widgets/widget-customsearch.php';
require get_template_directory() . '/inc/widgets/widget-filter.php';
require get_template_directory() . '/inc/widgets/widget-rating.php';

/**
 * Enqueue scripts and styles.
 */
function wayup_scripts() {
//  Подключение CSS
  wp_enqueue_style('wayup-style', get_stylesheet_uri());
  wp_enqueue_style('wayup-vendor', get_template_directory_uri() . '/assets/css/vendor.min.css', array(), '1.0');
  wp_enqueue_style('wayup-main', get_template_directory_uri() . '/assets/css/main.min.css', array(), '1.0');

//  Подключение JS

  // Deregister core jQuery
  wp_deregister_script('jquery');

// Register
  wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '3.4.1', true);

// Add jQuery
  wp_enqueue_script('jquery');
  wp_enqueue_script('wayup-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), '1.0', true);
  wp_enqueue_script('wayup-common', get_template_directory_uri() . '/assets/js/common.min.js', array(), '1.0', true);
  wp_enqueue_script('wayup-svg-sprite', get_template_directory_uri() . '/assets/img/svg-sprite/svg-sprite.js', array(), '1.0', false);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('wayup_woo_filter', get_template_directory_uri() . '/assets/js/woo_filter.js', array('jquery'), '', true);
  wp_localize_script('wayup_woo_filter', 'wayup_settings', array('ajax_url' => admin_url('admin-ajax.php')));
  wp_enqueue_script('wayup_woo_filter');
}

add_action('wp_enqueue_scripts', 'wayup_scripts');

function wayup_addminscripts($hook) {

  // Add scripts for metaboxes
  if ($hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php') {
    wp_enqueue_style('wayup-metabox', get_template_directory_uri() . '/assets/css/libs/metabox.css', array(), '1.0');

    wp_enqueue_script('wayup-metaboxes', get_template_directory_uri() . '/assets/js/libs/metaboxes.js', array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox'));
  }
}

add_action('admin_enqueue_scripts', 'wayup_addminscripts', 10);

//Класс на BODY для специфической страницы
add_filter('body_class', 'wayup_body_class');
function wayup_body_class($classes) {
  if (is_page_template('template-home.php')) {
    $classes[] = 'is-home';
  } else {
    $classes[] = 'inner-page';
  }
  return $classes;
}

//Добавление класса в форму сайдбара
add_filter('mc4wp_form_css_classes', function ($classes) {
  $classes[] = 'subscr__form log';
  return $classes;
});

/*
 * Регистрируем посттайп для Testimonials
 * */
function wayup_register_custom_post_type() {

  register_post_type('testimonial', array(
    'labels' => array(
      'name' => 'Отзывы',
      'singular_name' => 'Отзыв',
      'add_new' => 'Добавить новый'
    ),
    'description' => __('Description.', 'your-plugin-textdomain'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'testimonials'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-format-quote',
    'supports' => array('title', 'editor', 'thumbnail')
  ));

  register_post_type('service', array(
    'labels' => array(
      'name' => 'Услуги',
      'singular_name' => 'услуга',
      'add_new' => 'Добавить новую'
    ),
    'description' => __('Description.', 'your-plugin-textdomain'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'services'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-admin-tools',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
  ));

  register_post_type('news', array(
    'labels' => array(
      'name' => esc_html__('Новости', 'wayup'),
      'singular_name' => esc_html__('Новость', 'wayup'),
      'add_new' => 'Добавить новую'
    ),
    'description' => __('Description.', 'your-plugin-textdomain'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'news'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-format-aside',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
  ));

  register_post_type('feature', array(
    'labels' => array(
      'name' => 'Кейсы',
      'singular_name' => 'Кейс',
      'add_new' => 'Добавить новый'
    ),
    'description' => __('Description.', 'wayup'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'feature'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-dashboard',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
  ));

//  Register taxonomy
  register_taxonomy('service-type', 'service', [
    'label' => esc_html__('Service Type'),
    'rewrite' => [
      'slug' => 'service-type'
    ],
    'hierarchical' => true
  ]);

  register_taxonomy('news-category', 'news', [
    'label' => 'Категории новостей',
    'rewrite' => [
      'slug' => 'news-category'
    ],
    'hierarchical' => true
  ]);

  register_taxonomy('feature-category', 'feature', [
    'label' => 'Категории кейсов',
    'rewrite' => [
      'slug' => 'case-category'
    ],
    'hierarchical' => true
  ]);
}

add_action('init', 'wayup_register_custom_post_type');


//Количество постов на странице архива
function wayup_posts_per_archiepage($query) {
  global $wayup_options;
  $posts_per_page_testy = -1;
  $posts_per_page_news = -1;
  if ($wayup_options['testimonial_posts']) {
    $posts_per_page_testy = $wayup_options['testimonial_posts'];
  }
  if ($wayup_options['newspostperpage']) {
    $posts_per_page_news = $wayup_options['newspostperpage'];
  }

  if (!is_admin() && is_post_type_archive('testimonial')) {
    $query->set('posts_per_page', $posts_per_page_testy);
  }

  if (!is_admin() && is_post_type_archive('news')) {
    $query->set('posts_per_page', $posts_per_page_news);
  }
}

add_action('pre_get_posts', 'wayup_posts_per_archiepage');

//Функция возвращает данные по ID картинки
function wayup_get_attachment($attachment_id) {

  $attachment = get_post($attachment_id);
  return array(
    'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
    'caption' => $attachment->post_excerpt,
    'description' => $attachment->post_content,
    'href' => get_permalink($attachment->ID),
    'src' => $attachment->guid,
    'title' => $attachment->post_title
  );
}

//Кастомное количество символов в выводе except
function wayup_custom_except($limit) {
  $except = explode(' ', get_the_excerpt(), $limit);

  if (count($except) >= $limit) {
    array_pop($except);
    $except = implode(' ', $except) . '...';
  } else {
    $except = implode(' ', $except);
  }

  $except = preg_replace('`\[[^\]]*\]`', '', $except);
  return $except;
}

function wayup_show_products() {
  $queryData = $_GET;
  $paged = (isset($queryData['paged'])) ? intval($queryData['paged']) : 1;
  $orderby = 'date';
  $orderby = $queryData['orderBy'];

  $posts_per_page = get_option('woocommerce_catalog_columns') * get_option('woocommerce_catalog_rows');

  //Filter by category ID
  $cats = ($queryData['category']) ? explode(',', $queryData['category']) : false;
  $tax_query = ($cats) ? array(array(
    'taxonomy' => 'product_cat',
    'field' => 'id',
    'terms' => $cats
  )) : false;

  $args = array(
    'post_type' => 'product',
    'paged' => $paged,
    'posts_per_page' => $posts_per_page,
    'tax_query' => $tax_query,
    'meta_query' => array(
      array(
        'key' => '_price',
        'value' => $queryData['prices'],
        'compare' => 'BETWEEN',
        'type' => 'NUMERIC'
      )
    ),
    /*'orderby' => 'meta_value_num',
    'meta_key' => '_wc_average_rating',
    'order' => 'desc'*/
  );

  switch ($orderby) {
    case 'date':
      $args['orderby'] = 'date';
      $args['order'] = 'desc';
      break;
    case 'price':
      $args['orderby'] = 'meta_value_num';
      $args['meta_key'] = '_price';
      $args['order'] = 'asc';
      break;
    case 'price-desc':
      $args['orderby'] = 'meta_value_num';
      $args['meta_key'] = '_price';
      $args['order'] = 'desc';
      break;
    case 'popularity':
      $args['orderby'] = 'meta_value_num';
      $args['meta_key'] = 'total_sales';
      $args['order'] = 'desc';
      break;
    case 'rating':
      $args['orderby'] = 'meta_value_num';
      $args['meta_key'] = '_wc_average_rating';
      $args['order'] = 'desc';
      break;
  }

  $loop = new WP_Query($args);
  if ($loop->have_posts()) {
    while ($loop->have_posts()) : $loop->the_post();
      wc_get_template_part('content', 'product');
    endwhile;
    ?>

    <nav class="woocommerce-pagination pagination">

      <?php if ($loop->max_num_pages > 1) { ?>
        <div class="nav-links">
          <!--          Выводим левую стрелку для первой страницы-->
          <?php if ($paged == 0 || $paged == 1) { ?>
            <span class="prev page-numbers"></span>
          <?php } ?>

          <!--          Вывод пагинации-->
          <?php
          $big = 999999999; // уникальное число для замены

          $args = array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, $paged),
            'prev_text' => '',
            'next_text' => '',
            'total' => $loop->max_num_pages
          );

          echo paginate_links($args);
          ?>

          <!--          Выводим правую стрелку для первой страницы-->
          <?php if ($paged == $loop->max_num_pages) { ?>
            <span class="next page-numbers"></span>
          <?php } ?>
        </div>
      <?php } ?>

    </nav>

    <?php
  } else {
    echo __('No products found', 'wayup');
  }
  wp_reset_postdata();

  die();
}

add_action('wp_ajax_wayup_filter', 'wayup_show_products');
add_action('wp_ajax_nopriv_wayup_filter', 'wayup_show_products');

//Добавление кастомного поля в форму регистрации
add_action('register_form', 'wayup_add_register_fields');
function wayup_add_register_fields() {
  $user_phone = (isset($_POST['billing_phone']) ? $_POST['billing_phone'] : '');
  $user_firstname = (isset($_POST['billing_first_name']) ? $_POST['billing_first_name'] : '');
  ?>
  <p>
    <label for="firstname"><?php _e('Phone') ?><br/>
      <input type="text" name="billing_phone" id="billing_phone" class="input"
             value="<?php echo esc_attr($user_phone); ?>"/>
    </label>
  </p>
  <p>
    <label for="billing_first_name"><?php _e('First Name') ?><br/>
      <input type="text" name="billing_first_name" id="billing_first_name" class="input"
             value="<?php echo esc_attr($user_firstname); ?>"/>
    </label>
  </p>
  <?php
}

// save new form field
add_filter('user_register', 'wayup_user_register');
function wayup_user_register($user_id) {
  if (!empty($_POST['billing_phone'])) {
    update_user_meta($user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
  }
  if (!empty($_POST['billing_first_name'])) {
    update_user_meta($user_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
  }
}

add_action('woocommerce_save_account_details', 'wayup_woocommerce_save_account_details');
function wayup_woocommerce_save_account_details($user_id) {
  update_user_meta($user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
}

?>
