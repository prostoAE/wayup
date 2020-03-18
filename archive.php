<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wayup
 */

get_header();
global $wp_query;
?>

  <section class="inner events">
    <div class="wrapper">
      <div class="news">
        <h2 class="news__title secondary-title">
          <span><?php the_archive_title( '', '' ); ?></span><br><?php the_archive_description( '', '' ); ?></h2>

        <?php
        if (have_posts()) :
          /* Start the Loop */
          while (have_posts()) : the_post(); ?>

            <!-- One new -->
            <article class="news__item">
              <div class="news__wrap">
                <div class="news__img blue-noise">
                  <?php echo get_the_post_thumbnail(get_the_ID(), 'news-thumb') ?>
                  <ul class="tags-list">
                    <?php
                    $news_categories = wp_get_post_terms(get_the_ID(), 'news-category');
                    foreach ($news_categories as $category) { ?>
                      <li><a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></li>
                    <?php } ?>
                  </ul>
                </div>
                <div class="news__side">
                  <div class="add-time">
                    <svg width="13" height="13">
                      <use xlink:href="#time"/>
                    </svg>
                    <p class="add-time__date"><?php echo get_the_date() ?></p>
                  </div>
                  <div class="rate"></div>
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
                  <a href="<?php the_permalink(); ?>" class="news__link link-more">
                    Читать больше
                    <svg width="18" height="20">
                      <use xlink:href="#nav-right"/>
                    </svg>
                  </a>
                </div>
              </div>
              <h5 class="news__heading"><?php the_title(); ?></h5>
              <p class="news__text"><?php the_excerpt(); ?></p>
            </article><!-- End one new -->

          <?php
          endwhile;
          wp_reset_postdata();

        endif;
        ?>

        <!-- Pagination -->

        <?php if ($wp_query->max_num_pages > 1) { ?>
          <nav class="pagination">
            <div class="nav-links">
              <!--          Выводим левую стрелку для первой страницы-->
              <?php if (get_query_var('paged') == 0) { ?>
                <span href="#" class="prev page-numbers"></span>
              <?php } ?>

              <!--          Вывод пагинации-->
              <?php
              $big = 999999999; // уникальное число для замены

              $args = array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'prev_text' => '',
                'next_text' => '',
                'total' => $wp_query->max_num_pages
              );

              echo paginate_links($args);
              ?>

              <!--          Выводим правую стрелку для первой страницы-->
              <?php if (get_query_var('paged') == $wp_query->max_num_pages) { ?>
                <span href="#" class="next page-numbers"></span>
              <?php } ?>
            </div>
          </nav>
        <?php } ?>


      </div>

      <?php get_sidebar(); ?>
    </div>
  </section>

<?php
get_sidebar();
get_footer();
