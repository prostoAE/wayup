<?php
get_header();

if (have_posts()) :
  /* Start the Loop */
  while (have_posts()) : the_post();
    the_title();
  endwhile;

  the_posts_navigation();
else :
  echo 'Нет кейсов';
endif;

get_footer();