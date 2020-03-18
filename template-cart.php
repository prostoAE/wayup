<?php
/**
 * Template name: Шаблон: Корзина и заказ
 */
get_header();
?>

  <!-- Service -->
  <section class="single cart pay">
    <div class="wrapper">
      <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
    </div>
  </section>

<?php


get_footer();
