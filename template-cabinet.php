<?php
/**
 * Template name: Cabinet
 */

get_header();
?>
  <section class="cabinet">
    <div class="wrapper">

          <?php
          while (have_posts()) :
            the_post();

            the_content();

          endwhile; // End of the loop.
          ?>

    </div>
  </section>
<?php

get_footer();
