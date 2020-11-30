<?php
/**
 * Template Name: Kontakt
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="about">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-4 about_list">
        <div></div>
        </div>

      <div class="col-12 col-md-8 about_content">
        <h1 class="content_title"><?php echo get_the_title(); ?></h1>
        <div class="contact_content">
        <?php echo get_field('content'); ?></div>
      </div>
</div>
  </div>
</section>
<?php
get_footer();
