<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

if (!comments_open()) {
  return;
}

?>

<div class="clients">

  <?php if (have_comments()) : ?>
    <?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>

    <?php
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
      echo '<nav class="woocommerce-pagination">';
      paginate_comments_links(
        apply_filters(
          'woocommerce_comment_pagination_args',
          array(
            'prev_text' => '&larr;',
            'next_text' => '&rarr;',
            'type' => 'list',
          )
        )
      );
      echo '</nav>';
    endif;
    ?>
  <?php else : ?>
    <p class="woocommerce-noreviews"><?php esc_html_e('There are no reviews yet.', 'wayup'); ?></p>
  <?php endif; ?>

  <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>


    <p class="log__title">Оставьте ваш отзыв</p>

    <?php
    $commenter = wp_get_current_commenter();
    $comment_form = array(
      /* translators: %s is product title */
      'title_reply' => '',//have_comments() ? esc_html__('Add a review', 'woocommerce') : sprintf(esc_html__('Be the first to review &ldquo;%s&rdquo;', 'woocommerce'), get_the_title()),
      /* translators: %s is product title */
      'title_reply_to' => esc_html__('Leave a Reply to %s', 'woocommerce'),
      'title_reply_before' => '<span id="reply-title" class="comment-reply-title">',
      'title_reply_after' => '</span>',
      'class_form' => 'log clients__form review-form log__wrap',
      'comment_notes_after' => '',
      'label_submit' => '',
      'logged_in_as' => '
        <div class="comment-form-phone log__group"><label for="phone">Телефон</label><input id="phone" class="log__input" name="phone" type="tel" value="" size="30"></div>
        <div class="comment-form-social log__group"><label for="social">Social</label><input id="social" class="log__input" name="social" type="text" value="" size="30"></div>
      ',
      'comment_field' => '',
    );

    $name_email_required = (bool)get_option('require_name_email', 1);
    $fields = array(
      'author' => array(
        'label' => __('Name', 'woocommerce'),
        'type' => 'text',
        'value' => $commenter['comment_author'],
        'required' => '',//$name_email_required,
      ),
      'email' => array(
        'label' => __('Email', 'woocommerce'),
        'type' => 'email',
        'value' => $commenter['comment_author_email'],
        'required' => '',//$name_email_required,
      ),
      'phone' => array(
        'label' => __('Phone', 'woocommerce'),
        'type' => 'tel',
        'value' => '',
        'required' => '',
      ),
      'social' => array(
        'label' => __('Social', 'woocommerce'),
        'type' => 'text',
        'value' => '',
        'required' => '',
      ),
    );

    $comment_form['fields'] = array();

    foreach ($fields as $key => $field) {
      $field_html = '<div class="comment-form-' . esc_attr($key) . ' log__group">';
      $field_html .= '<label for="' . esc_attr($key) . '">' . esc_html($field['label']);

      if ($field['required']) {
        $field_html .= '&nbsp;<span class="required">*</span>';
      }

      $field_html .= '</label><input id="' . esc_attr($key) . '" class="log__input" name="' . esc_attr($key) . '" type="' . esc_attr($field['type']) . '" value="' . esc_attr($field['value']) . '" size="30" ' . ($field['required'] ? 'required' : '') . ' /></div>';

      $comment_form['fields'][$key] = $field_html;
    }

    $account_page_url = wc_get_page_permalink('myaccount');
    if ($account_page_url) {
      /* translators: %s opening and closing link tags respectively */
      $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(esc_html__('You must be %1$slogged in%2$s to post a review.', 'woocommerce'), '<a href="' . esc_url($account_page_url) . '">', '</a>') . '</p>';
    }

    $comment_form['comment_field'] = '<div class="comment-form-comment log__group log__group_textarea"><label for="comment">' . esc_html__('Your review', 'woocommerce') . '&nbsp;<span class="required">*</span></label><textarea id="comment" class="log__input" name="comment" required></textarea></div><p class="log__line"><span>*</span>Поля обязательные для заполнения</p>';

    if (wc_review_ratings_enabled()) {
      $comment_form['comment_field'] .= '
        <div class="log__block">
          <div class="log__rate rating">
            <span>Ваша оценка</span>
            <div class="rating__choice" id="rate-choice">
              <div class="rating__group">
                <input type="radio" value="1" name="rating">
                <label></label>
              </div>
              <div class="rating__group">
                <input type="radio" value="2" name="rating">
                <label></label>
              </div>
              <div class="rating__group">
                <input type="radio" value="3" name="rating">
                <label></label>
              </div>
              <div class="rating__group">
                <input type="radio" value="4" name="rating">
                <label></label>
              </div>
              <div class="rating__group">
                <input type="radio" value="5" name="rating" checked="checked">
                <label></label>
              </div>
            </div>
          </div>
          
          <div class="log__btn">
            <input id="send" type="submit" value="Отправить" class="btn">
          </div>
        </div>';
    }

    comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
    ?>

  <?php else : ?>
    <p class="woocommerce-verification-required"><?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'woocommerce'); ?></p>
  <?php endif; ?>
</div>
