<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wayup
 */

get_header();
?>

<?php while (have_posts()) : the_post(); ?>

  <!-- News -->
  <section class="single event">
    <div class="event-top"
         style="background: #fff url(<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(get_the_ID()), 'full'); ?>) no-repeat center top/ cover;">
      <div class="wrapper">
        <div class="event-top__wrap">
          <div class="add-time">
            <svg width="13" height="13">
              <use xlink:href="#time"/>
            </svg>
            <p class="add-time__date"><?php the_date(); ?></p>
          </div>
          <div class="rate"></div>
        </div>
        <h1 class="event-top__title">
          <?php the_title(); ?>
        </h1>
        <ul class="tags-list">
          <?php
          wp_list_categories([
            'title_li' => ''
          ]);
          ?>
        </ul>
      </div>
    </div>
    <div class="wrapper">
      <div class="event__content">
        <?php the_content(); ?>

        <div class="event__wrap">
          <div class="share">
            <p class="share__title">
              <svg width="15" height="15">
                <use xlink:href="#link"/>
              </svg>
              Поделиться:
            </p>
            <ul class="social">
              <li class="social__item">
                <span>Vk</span>
                <a data-social="vkontakte" class="social__icon social__icon_vk"
                   href="<?php echo wayup_get_share('vk') ?>"
                   onclick="window.open(this.href, 'Share on VK', 'width=600,height=300'); return false">
                  <svg width="21" height="18">
                    <use xlink:href="#vk"/>
                  </svg>
                </a>
              </li>
              <li class="social__item">
                <span>Fb</span>
                <a data-social="facebook" class="social__icon social__icon_fb"
                   href="<?php echo wayup_get_share('fb') ?>"
                   onclick="window.open(this.href, 'Share on Facebook', 'width=600,height=300'); return false">
                  <svg width="14" height="17">
                    <use xlink:href="#facebook"/>
                  </svg>
                </a>
              </li>
              <li class="social__item">
                <span>Tw</span>
                <a data-social="twitter" class="social__icon social__icon_tw"
                   href="<?php echo wayup_get_share('twi') ?>"
                   onclick="window.open(this.href, 'Share on Twitter', 'width=600,height=300'); return false">
                  <svg width="18" height="15">
                    <use xlink:href="#twitter"/>
                  </svg>
                </a>
              </li>
            </ul>
          </div>
          <ul class="event__nav">
            <?php
            $prev_post = get_previous_post();
            if (!empty($prev_post)) {
              ?>
              <li class="prev">
                <a href="<?php echo esc_url(get_permalink($prev_post)); ?>"><?php echo esc_html_e('Предыдущая новость', 'wayup')?></a>
              </li>
              <?php
            }

            $next_post = get_next_post();
            if (!empty($next_post)) {
              ?>
              <li class="next">
                <a href="<?php echo esc_url(get_permalink($next_post)); ?>"><?php echo esc_html_e('Следующая новость', 'wayup'); ?></a>
              </li>
              <?php
            }
            ?>


          </ul>
        </div>

        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
          comments_template();
        endif;
        ?>

      </div>
      <?php get_sidebar(); ?>
    </div>
  </section>

<?php endwhile; ?>


<?php
get_sidebar();
get_footer();
