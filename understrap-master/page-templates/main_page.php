<?php

/**
 * Template Name: Strona główna
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<section class="main">
  <div class="main_page_banner"><img src="<?php echo get_field('main_background'); ?>"></div>
  <div class="container news_row">
    <div class="row posts">
      <?php
      /* 'post_title'    =>   $title,
   'post_content'  =>   $description,
   'post_date'     =>   $postdate,
   'post_status'   =>   'publish',
   'post_parent'   =>   $parent_id,
   'post_author'   =>   get_current_user_id(), */

      switch ($id) {
        case 5:
          $cat = 'tytani';
          $news_page_id = '?page_id=530';
          break;
        case 11:
          $cat = 'perelki';
          $news_page_id = '?page_id=529';
          break;
        case 9:
          $cat = 'juniorzy';
          $news_page_id = '?page_id=528';
          break;
        case 14:
          $cat = 'giganci';
          $news_page_id = '?page_id=16';
          break;
      }

      $args = array(
        'order' => 'DESC',
        'posts_per_page' => 5,
        'post_date' => date("Y-m-d"),
        'category_name' => $cat
      );
      $post_number = 1;
      $query = new WP_Query($args);

      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); {
            if ($post_number == 1) {
              $col_md = 12;
              $col = 4;
              $type = "new_post";
            } else {
              $col_md = 12;
              $col = 2;
              $type = "old_post";
            }
            $time = $post_number * 500;
            $link = get_site_url() . $news_page_id . '&post_id=' . get_the_id();
            echo '<div data-aos="fade-up"
     data-aos-duration="' . $time . '" class="no_padding col-12 col-md-' . $col_md . ' col-xl-' . $col . ' post post_number_' . $post_number . '"><a href=' . $link . '><div class="' . $type . '">';

            if (has_post_thumbnail()) {
              the_post_thumbnail('full');
            } else {
              echo '<p>Brak obrazu</p>';
            }
            echo  '<div class="post_title_div">';
            echo '<p>' . get_the_date() . '</p>';
            echo '<h2>' . $post->post_title . '</h2>';
            echo '<div class="more_button"><a href="' . $link . '">
            <img src="' . get_site_url() . '/wp-content/themes/understrap-master/css/BG_images/wiecej_2_a.png" class="see_more_img">
            </a>';
            echo '</div></div></div></div></a>';
            $post_number++;
          }
        endwhile;
      else :
      endif;
      ?>

    </div>
  </div><!-- #page-wrapper -->
</section>


<script>
  jQuery('.see_more_img').on({
    'hover': function() {
      var src = (jQuery(this).attr('src') === '<?php echo get_site_url() . "/wp-content/themes/understrap-master/css/BG_images/wiecej_2_a.png" ?>') ?
        '<?php echo get_site_url() . "/wp-content/themes/understrap-master/css/BG_images/wiecej_2_b.png" ?>' :
        '<?php echo get_site_url() . "/wp-content/themes/understrap-master/css/BG_images/wiecej_2_a.png" ?>';
      jQuery(this).attr('src', src);
    }
  });
</script>
<?php get_footer();
