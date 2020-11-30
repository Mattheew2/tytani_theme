<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<footer>
  <div class="container-fluid" style="overflow:hidden; padding:0px;" id="wrapper-footer">
    <div class="row shop_sponsor">
      <div class="col-12 col-md-6">
        <a href="?page_id=288">
          <img src="<?php echo site_url(); ?>/wp-content/uploads/2020/03/sklep_kibica.png" alt="sklep kibica" data-aos="flip-down">
        </a>
      </div>
      <div class="col-12 col-md-6">
        <a href="?page_id=522">
          <img src="<?php echo site_url(); ?>/wp-content/uploads/2020/03/zostan_sponsorem.png" alt="oferta sponsorska" data-aos="flip-up">
        </a>
      </div>
    </div>
    <div class="over_sponsors"></div>
    <div class="footer_sponsors">
      <div class="container">
        <h6 data-aos="zoom-in-down">Sponsorzy</h6>
        <div class="row footer_sponsors_logos">
          <div class="col-12 col-md-6">
            <?php
            $sponsor = array(
              'post_type' => 'sponsors',
              'posts_per_page' => 6
            );
            $sponsor_query = new WP_Query($sponsor);
            $s = 1;
            if ($sponsor_query->have_posts()) : ?>
              <!-- pagination here -->
              <?php while ($sponsor_query->have_posts()) : $sponsor_query->the_post();
                $time = $s * 300;
              ?>
                <a href="<?php the_field('link'); ?>"><img data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-delay="<?php echo $time; ?>" src="<?php the_field('logo'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"></a>
                <?php if ($s == 3) {
                  echo ' </div>
          <div class="col-12 col-md-6">';
                }; ?>

              <?php
                $s++;
              endwhile; ?>
              <!-- pagination here -->
              <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row credits" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
          <div class="col"></div>
          <div class="col-12 col-xs-8 col-md-5 col-xl-4">
            <div class="footer_logo"><img src="<?php echo site_url(); ?>/wp-content/uploads/2020/03/logo_tytani2.png" alt="tytani logo">
            </div>
            <div class="left">
              <h6>copyright tytani lublin</h6>
            </div>
            <div class="right"> <a href="http://www.brandking.eu/" target="_blank">
                <h6>made by brandking</h6>
              </a></div>
          </div>
          <div class="col"></div>
        </div>

      </div>
    </div><?php echo do_shortcode('[bazo-company]'); ?>
  </div>


  <?php wp_footer(); ?>
</footer>
<?php if (!wp_is_mobile()) { ?>
  <script>
    AOS.init({
      disable: 'mobile',
      once: true
    });
  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<?php } ?>
</body>

</html>