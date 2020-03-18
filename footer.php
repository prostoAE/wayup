<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wayup
 */
global $wayup_options;
?>

<footer class="footer">
  <div class="wrapper">
    <div class="footer__block">
      <a href="index.html" class="logo noise">
        <p class="logo__icon"><?php bloginfo('name'); ?></p>
        <p class="logo__desc"><?php bloginfo('description'); ?></p>
      </a>
      <ul class="social">
        <?php $social_links = $wayup_options['social_links'];
        foreach ($social_links as $key => $link) {
          $label = '';
          $svg = '';
          $class = '';

          if ($key == 'Vkontakte Link') {
            $label = '<span>vk</span>';
            $svg = '<svg width="21" height="18"><use xlink:href="#vk"/></svg>';
            $class = 'social__icon_vk';
          } elseif ($key == 'Facebook Link') {
            $label = '<span>Fb</span>';
            $svg = '<svg width="14" height="17"><use xlink:href="#facebook"/></svg>';
            $class = 'social__icon_fb';
          } elseif ($key == 'Twitter Link') {
            $label = '<span>Tw</span>';
            $svg = '<svg width="18" height="15"><use xlink:href="#twitter"/></svg>';
            $class = 'social__icon_tw';
          } elseif ($key == 'Instagram Link') {
            $svg = '<svg width="16" height="16"><use xlink:href="#instagram"/></svg>';
            $class = 'social__icon_inst';
          }
          ?>
          <?php if ($link) { ?>
            <li class="social__item">
              <?php echo $label; ?>
              <a class="social__icon <?php echo $class; ?>" target="_blank" href="<?php echo $link; ?>">
                <?php echo $svg; ?>
              </a>
            </li>
          <?php } ?>
        <?php }
        ?>
      </ul>
      <?php if ($wayup_options['footer-info']) { ?>
        <p class="footer__special"><?php echo $wayup_options['footer-info']; ?></p>
      <?php } ?>
    </div>
    <nav class="guide">
      <?php if ($wayup_options['footer-section1']) { ?>
        <p class="guide__title"><?php echo $wayup_options['footer-section1']; ?></p>
      <?php } ?>
      <?php
      wp_nav_menu(array(
        'theme_location' => 'menu-footer-1',
        'menu_id' => 'footer-navigation-one',
        'container' => '',
        'menu_class' => ''
      ));
      ?>
    </nav>
    <div class="serv">
      <?php if ($wayup_options['footer-section2']) { ?>
        <p class="serv__title"><?php echo $wayup_options['footer-section2']; ?></p>
      <?php } ?>
      <?php
      wp_nav_menu(array(
        'theme_location' => 'menu-footer-2',
        'menu_id' => 'footer-navigation-two',
        'container' => '',
        'menu_class' => ''
      ));
      ?>
    </div>
    <div class="contact">
      <?php if ($wayup_options['footer-section3']) { ?>
        <p class="contact__title"><?php echo $wayup_options['footer-section3']; ?></p>
      <?php } ?>
      <ul class="contact__list">
        <?php if ($wayup_options['footer-address']) { ?>

          <li class="contact__item">
            <svg width="20" height="25">
              <use xlink:href="#pin"/>
            </svg>
            <p class="contact__text contact__text_address"><?php echo $wayup_options['footer-address']; ?></p>
          </li>
        <?php } ?>
        <li class="contact__item">
          <svg width="21" height="21">
            <use xlink:href="#phone"/>
          </svg>
          <div class="contact__phones">
            <?php
            foreach ($wayup_options['footer-phone'] as $phone) {
              if ($phone) { ?>
                <a href="tel:<?php echo esc_attr($phone); ?>"
                   class="contact__text contact__text_phone"><?php echo esc_attr($phone); ?></a>
              <?php }
            } ?>
          </div>
        </li>
        <?php if ($wayup_options['footer-email']) { ?>
          <li class="contact__item">
            <svg width="25" height="19">
              <use xlink:href="#mail"/>
            </svg>
            <p class="contact__text contact__text_mail"><?php echo $wayup_options['footer-email']; ?></p>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div class="subscribe">
      <?php if ($wayup_options['footer-section4']) { ?>
        <p class="subscribe__title"><?php echo $wayup_options['footer-section4']; ?></p>
      <?php } ?>

      <?php echo do_shortcode($wayup_options['footer-subscribeshortcode']); ?>

      <!--<form action="#" class="subscribe__form" id="popupSubscribe">
        <input type="text" name="email" class="subscribe__input" placeholder="Ваш email">
        <button class="subscribe__btn btn" data-submit>Подписаться</button>
      </form>-->

      <div class="control">
        <div class="language">
          <ul>
            <li class="lang-item active">
              <a href="#">Ru</a>
            </li>
            <li class="lang-item">
              <a href="#">En</a>
            </li>
          </ul>
        </div>

        <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) {
          if (is_user_logged_in()) { ?>
            <div class="control__wrap">
              <a href="<?php echo esc_url(home_url('/my-account')); ?>" class="control__enter control__enter_cab">
                <svg class="control__icon" width="16" height="16">
                  <use xlink:href="#user"/>
                </svg>
                Личный кабинет
              </a>
              <a href="<?php echo wp_logout_url(home_url()); ?>" class="control__reg noise">Выход</a>
            </div>
          <?php } else { ?>
            <div class="control__wrap">
              <a href="#enter" class="control__enter popup-link-1">
                <svg class="control__icon" width="19" height="17">
                  <use xlink:href="#login"/>
                </svg>
                Вход
              </a>
              <a style="display: none;" href="cabinet.html" class="control__enter control__enter_cab">
                <svg class="control__icon" width="16" height="16">
                  <use xlink:href="#user"/>
                </svg>
                Личный кабинет
              </a>
              <a href="#reg" class="control__reg noise popup-link-2">Регистрация</a>
            </div>
          <?php } ?>
        <?php } ?>

      </div>
    </div>
    <?php if ($wayup_options['footer-copyrights']) { ?>
      <div class="footer__copy"><?php echo $wayup_options['footer-copyrights']; ?></div>
    <?php } ?>
  </div>
</footer><!-- End footer -->


<?php if (is_singular('product')) {
  get_template_part('template-parts/order_popup');
}

if ('yes' === get_option('woocommerce_enable_myaccount_registration')) {
  get_template_part('template-parts/auth');
}
// Call us modal popup
get_template_part('template-parts/popup_contact');
?>

<?php wp_footer(); ?>

</body>
</html>
