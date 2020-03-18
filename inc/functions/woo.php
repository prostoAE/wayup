<?php
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

  //Интеграция с WooCommerce
  function wayup_add_woocommerce_support() {
    add_theme_support('woocommerce');
  }

  add_action('after_setup_theme', 'wayup_add_woocommerce_support');

  //Отображение количества товаров в корзине
  add_filter('woocommerce_add_to_cart_fragments', 'wayup_header_add_to_cart_fragment');
  function wayup_header_add_to_cart_fragment($fragments) {

    ob_start();

    echo '
      <a href="' . esc_url(wc_get_cart_url()) . '" class="heading__bag" title="' . esc_html__('cart', 'wayup') . '">
        <svg width="17" height="20">
          <use xlink:href="#bag"/>
        </svg>
        <span class="count">' . esc_attr(WC()->cart->get_cart_contents_count()) . '</span>
      </a>
    ';

    $fragments['a.heading__bag'] = ob_get_clean();
    return $fragments;
  }

  function wayup_wrapforimage_open() {
    echo '<div class="products__img">';
  }

  function wayup_wrapforimage_close() {
    echo '</div>';
  }

  function wayup_product_data() {
    global $product;

    $rating_count = $product->get_rating_count();
    $average = $product->get_average_rating();
    ?>

    <div class="products__detail">
      <a href="<?php the_permalink(); ?>" class="products__name"><?php
        if (get_post_meta(get_the_ID(), 'wayup_short_title', true)) {
          echo get_post_meta(get_the_ID(), 'wayup_short_title', true);
        } else {
          echo substr(get_the_title(), 0, 23);
        } ?>
      </a>

      <div class="price">
        <?php echo $product->get_price_html(); ?>
      </div>
      <?php echo wc_get_rating_html($average, $rating_count); ?>
    </div>

  <?php }

  function wayup_show_status() {
    if (get_post_meta(get_the_ID(), 'wayup_sale_button_title', true)) {
      $color = '';
      if (get_post_meta(get_the_ID(), 'wayup_sale_button_color', true)) {
        $color = 'style="background: ' . get_post_meta(get_the_ID(), 'wayup_sale_button_color', true) . ' "';
      }

      echo '<span class="new-item" ' . $color . '>' . get_post_meta(get_the_ID(), 'wayup_sale_button_title', true) . '</span>';
    }
  }

  function wayup_woo_sku_custom() {
    global $product;
    $class = '';
    if ($product->get_stock_status() !== 'outofstock') {
      $class = 'true';
    } ?>

    <div class="product__article">
      Артикул:
      <span class="product__article-value"><?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?></span>
    </div>
    <div class="availability <?php echo $class; ?>">
      <!-- Если у .availability нет класса .true – товара Нет в наличии -->
      <span class="true">В наличии</span>
      <span class="false">Нет в наличии</span>
    </div>
  <?php }

  function wayup_template_single_title() {
    if (get_post_meta(get_the_ID(), 'wayup_short_title', true)) {
      echo '<h1 class="product__title">' . get_post_meta(get_the_ID(), 'wayup_short_title', true) . '</h1>';
    } else {
      echo '<h1 class="product__title">' . the_title() . '</h1>';
    }
    if (get_the_excerpt()) {
      echo '<p class="product__desc">' . get_the_excerpt() . '</p>';
    }
  }

  function wayup_custom_addtocart_price() {
    global $product; ?>
    <div class="product__price">
      <?php echo $product->get_price_html(); ?>
    </div>
  <?php }

  function wayup_custom_share() { ?>
    <div class="share">
      <p class="share__title">
        Поделиться:
      </p>
      <ul class="social">
        <li class="social__item">
          <span>Vk</span>
          <a data-social="vkontakte" class="social__icon social__icon_vk"
             href="<?php echo wayup_get_share('vk', get_the_permalink(), get_the_title()); ?>"
             onclick="window.open(this.href, 'Share on VK', 'width=600,height=300'); return false">
            <svg width="21" height="18">
              <use xlink:href="#vk"/>
            </svg>
          </a>
        </li>
        <li class="social__item">
          <span>Fb</span>
          <a data-social="facebook" class="social__icon social__icon_fb"
             href="<?php echo wayup_get_share('fb', get_the_permalink(), get_the_title()); ?>"
             onclick="window.open(this.href, 'Share on Facebook', 'width=600,height=300'); return false">
            <svg width="14" height="17">
              <use xlink:href="#facebook"/>
            </svg>
          </a>
        </li>
        <li class="social__item">
          <span>Tw</span>
          <a data-social="twitter" class="social__icon social__icon_tw"
             href="<?php echo wayup_get_share('twi', get_the_permalink(), get_the_title()); ?>"
             onclick="window.open(this.href, 'Share on Twitter', 'width=600,height=300'); return false">
            <svg width="18" height="15">
              <use xlink:href="#twitter"/>
            </svg>
          </a>
        </li>
      </ul>
    </div>
  <?php }

  //Image slider for Single Product Page
  /*add_action('after_setup_theme', 'ale_woocommerce_plugin_setup');

  function ale_woocommerce_plugin_setup() {
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
  }*/

  add_action('comment_post', 'wayuo_save_comment_meta_data');
  function wayuo_save_comment_meta_data($comment_id) {
    if (!empty($_POST['phone'])) {
      $phone = sanitize_meta('phone', $_POST['phone'], 'text');
      add_comment_meta($comment_id, 'phone', $phone);
    }
    if (!empty($_POST['social'])) {
      $social = sanitize_meta('social', $_POST['social'], 'text');
      add_comment_meta($comment_id, 'social', $social);
    }
  }


  function wayup_move_comment_field_to_bottom($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
  }

  add_filter('comment_form_fields', 'wayup_move_comment_field_to_bottom');


  function wayup_filter_comment_form_submit_button($submit_button, $args) {
    if (is_singular('product')) {
      return;
    } else {
      return $submit_button;
    }
  }

  add_filter('comment_form_submit_button', 'wayup_filter_comment_form_submit_button', 10, 2);

  function my_custom_show_sale_price_at_cart($old_display, $cart_item, $cart_item_key) {
    /** @var WC_Product $product */
    $product = $cart_item['data'];
    if ($product) {
      return $product->get_price_html();
    }
    return $old_display;
  }

  add_filter('woocommerce_cart_item_price', 'my_custom_show_sale_price_at_cart', 10, 3);


  //Убираем старый сайдбар и заменяем его персональным
  remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

  add_action('woocommerce_sidebar', function () {
    get_sidebar('woocommerce');
  });

  //Удалили описание
  remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
  remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

  //Переносим уведомление выше
  remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
  add_action('woocommerce_archive_description', 'woocommerce_result_count', 20);

  //Удаляем хук хлебных крошек
  remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

  //Переносим сортировку
  remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

  //Карточка продукта
  add_action('woocommerce_before_shop_loop_item', 'wayup_wrapforimage_open', 5);
  add_action('woocommerce_before_shop_loop_item_title', 'wayup_wrapforimage_close', 20);
  add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15);
  remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

  add_action('woocommerce_shop_loop_item_title', function () {
    echo '<div class="products__bottom">';
  }, 5);
  add_action('woocommerce_after_shop_loop_item', function () {
    echo '</div>';
  }, 15);

  remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
  add_action('woocommerce_shop_loop_item_title', 'wayup_product_data', 10);

  remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
  remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

  add_action('woocommerce_before_shop_loop_item_title', 'wayup_show_status', 9);


  //Хуки для карточки открытого товара
  add_action('woocommerce_single_product_summary', 'wayup_woo_sku_custom', 4);
  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
  add_action('woocommerce_single_product_summary', 'wayup_template_single_title', 5);
  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
  add_action('woocommerce_before_add_to_cart_button', 'wayup_custom_addtocart_price', 5);
  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
  add_action('woocommerce_share', 'wayup_custom_share', 5);
  remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
  remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

  //Корзина товаров
  remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

  //Страница оформления заказа
  remove_action('woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20);

}
