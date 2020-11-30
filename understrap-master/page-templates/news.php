<?php

/**
 * Template Name: Newsy
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$page_id = $_GET['page_id'];
$parent = $post->post_parent;
switch ($parent) {
  case 5:
    $cate = 'tytani';
    break;
  case 11:
    $cate = 'perelki';
    break;
  case 9:
    $cate = 'juniorzy';
    break;
  case 14:
    $cate = 'giganci';
    break;
}

?>
<section class="contact">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-4 news_list">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel_controls">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <ol class="carousel-indicators">
              <?php

              $args_left = array(
                'order' => 'DESC',
                'posts_per_page' => 50,
                'post_date' => date('Y-m-d'),
                'category_name' => $cate
              );

              for ($k = 1; $k < 3; $k++) {
                $j = $k - 1;
                if ($k == 1) {
                  $class_active = 'active';
                } else {
                  $class_active = ' ';
                }
                echo   '<li data-target="#carouselExampleIndicators" data-slide-to="' . $j . '" class="' . $class_active . '">' . $k . '</li>';
              }
              ?>
            </ol>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <?php
              /* 'post_title'    =>   $title,
   'post_content'  =>   $description,
   'post_date'     =>   $postdate,
   'post_status'   =>   'publish',
   'post_parent'   =>   $parent_id,
   'post_author'   =>   get_current_user_id(), */

              $post_number = 1;
              $query = new WP_Query($args_left);
              if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); {
                    $link = get_the_permalink();
                    $post_id = get_the_ID();
                    if (!isset($_GET['post_id']) and $post_number == 1) {
                      $current = 'current';
                    } else {
                      if ($_GET['post_id'] == $post_id) {
                        $current = 'current';
                      } else {
                        $current = 'no_current';
                      }
                    }
              ?>
              <?php
                    echo '<a class="news_link" href="?page_id=' . $page_id . '&post_id=' . $post_id . '"><div class="row ' . $current . ' ">
      <div class="col"><h2 class="date_day">' . get_the_date('d') . '</h2><h3 class="date_month_year">' . get_the_date('M-Y') . '</h3></div>';
                    echo '<div class="col-8"><h2 class="news_post_title">' . $post->post_title . '</h2></div></div></a>';
                    $post_number++;
                  }
                  if ($post_number % 10 == 0) {
                    echo '</div>
            <div class="carousel-item">';
                  }

                endwhile;
              else :
              endif;
              ?>
            </div>

            <!-- Karzuela -->
          </div>

        </div>
        <!-- Koniec karuzueli-->

      </div>

      <div class="col-12 col-md-8 about_content">
        <h1 class="content_title">Aktualności</h1>

        <?php
        if (isset($_GET['post_id'])) {
          $get_post = $_GET['post_id'];
          $queried_post = get_post($get_post);
          $fname = get_the_author_meta('first_name');
          $lname = get_the_author_meta('last_name');
          $full_name = $fname . ' ' . $lname;
          $author_id = $queried_post->post_author;
          $display_name = get_the_author_meta('display_name', $author_id);

        ?>

          <div class="single_post">
            <h4><?php echo get_the_date('Y-m-d', $get_post); ?></h4>
            <h2><?php echo $queried_post->post_title; ?></h2>
            <p> <?php echo $queried_post->post_content; ?></p>
            <img src="<?php echo get_the_post_thumbnail_url($get_post); ?>">
            <h3><?php echo $display_name; ?></h3>
          </div>
          <?php } else {
          $latest = array(
            'order' => 'DESC',
            'posts_per_page' => 1,
            'category_name' => $cate
          );
          $latest_post = new WP_Query($latest);
          if ($latest_post->have_posts()) :
            while ($latest_post->have_posts()) : $latest_post->the_post(); {
                $link = get_the_permalink();
                $post_id = get_the_ID();
                $fname = get_the_author_meta('first_name');
                $lname = get_the_author_meta('last_name');
                $full_name = $fname . ' ' . $lname;
          ?>
                <div class="single_post">
                  <h4><?php echo get_the_date('Y-m-d', $get_post); ?></h4>
                  <h2><?php echo get_the_title(); ?></h2>
                  <p> <?php echo get_the_content(); ?></p>
                  <img src="<?php echo get_the_post_thumbnail_url($get_post); ?>">
                  <h3><?php echo $full_name; ?></h3>
                </div>
          <?php

              }
            endwhile;
          else :
          endif;
























          ?>

        <?php
        }
        ?>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();