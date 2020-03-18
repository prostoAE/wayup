<?php

$args = [
  'title1' => '',
  'title2' => '',
  'desc' => '',
  'featured_image' => '',
  'author' => '',
  'signature' => '',
  'quote' => '',
  'author_name' => '',
  'author_status' => '',
];

$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$author_url = '';
if (is_numeric($author)) {
  $author_url = wp_get_attachment_url($author);
}
$featured_image_url = '';
if (is_numeric($featured_image)) {
  $featured_image_url = wp_get_attachment_url($featured_image);
}
$signature_url = '';
if (is_numeric($signature)) {
  $signature_url = wp_get_attachment_url($signature);
}


?>

<!-- Choice -->
<section class="choice">
  <div class="wrapper">
    <div class="choice__block">
      <div class="choice__image">
        <div class="choice__pic blue-noise">
          <img src="<?php echo $featured_image_url; ?>" alt="JC">
        </div>
        <div class="director">
          <div class="director__img">
            <img src="<?php echo $author_url; ?>" alt="<?php echo esc_attr($author_name); ?>">
          </div>
          <div class="director__text">
            <p class="director__quote"><?php echo  $quote; ?></p>
            <div class="director__pers">
              <?php if (!empty($author_name)) { ?><span><?php echo esc_attr($author_name) ?></span><?php } ?>
              <?php echo $author_status; ?>
            </div>
          </div>
          <div class="director__sign">
            <img src="<?php echo $signature_url; ?>" alt="Подпись">
          </div>
        </div>
      </div>
      <div class="choice__wrap">
        <h2 class="choice__title secondary-title"><span><?php echo $title1; ?></span><br><?php echo $title2; ?></h2>
        <div class="choice__descr">
          <?php echo $desc; ?>
        </div>
      </div>
    </div>
  </div>
</section><!-- End choice -->