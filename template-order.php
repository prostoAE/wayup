<?php
/*
 * Template name: Template Order
 * */
get_header();

$cost = 0;
$title = 'Не выбранно';
$content = 'Не выбранно';

if(isset($_GET['price'])) {
  $cost = $_GET['price'];
}
if(isset($_GET['title'])) {
  $title = $_GET['title'];
}
if(isset($_GET['content'])) {
  $content = $_GET['content'];
}


?>

<?php while (have_posts()) : the_post(); ?>
<section class="inner order-page">
  <div class="wrapper">
    <div class="inner__content">
      <h2 class="inner__title inner-title"><span><?php the_title(); ?></h2>
      <div class="inner__img blue-noise">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
      </div>
      <div class="inner__block">
        <div class="inner__text">
          <h5 class="inner__top"><?php echo $title; ?></h5>
          <?php echo $content; ?>
          <span class="inner__price"><?php echo $cost; ?></span>
        </div>
<!--        <form action="#" class="inner__form log order-form" id="popupOrder">
          <p class="log__title">Оформить заказ</p>
          <div class="log__group">
            <label>Имя</label>
            <input type="text" name="name" class="log__input">
          </div>
          <div class="log__group">
            <label>Телефон</label>
            <input type="tel" name="tel" class="log__input">
          </div>
          <div class="log__group">
            <label>Email</label>
            <input type="email" name="email" class="log__input">
          </div>
          <p class="log__line"><span>*</span>Поля обязательные для заполнения</p>
          <div class="log__btn">
            <input id="order" type="submit" data-submit value="Заказать" class="btn"/>
          </div>
        </form>-->
        <?php echo do_shortcode(get_metadata('post', get_the_ID(), 'wayup_shortcode_order', true))?>
      </div>
    </div>

  </div>
</section><!-- End content -->
<?php endwhile; ?>

<?php
get_footer();
?>
