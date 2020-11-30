<?php
/**
 * Template Name: Strona główna
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="main">
   <div class="main_page_banner" style="background-image:url(<?php echo get_field('main_background'); ?>)">
  </div>
  
  <div class="container news_row">
    <div class="row posts">
      <?php
      /* 'post_title'    =>   $title,
   'post_content'  =>   $description,
   'post_date'     =>   $postdate,
   'post_status'   =>   'publish',
   'post_parent'   =>   $parent_id,
   'post_author'   =>   get_current_user_id(), */

      switch($id){
        case 5:
           $cat='tytani';
    break;  
        case 11:
           $cat='perelki';
    break; 
        case 9:
           $cat='juniorzy';
    break;  
        case 14:
           $cat='giganci';
    break;  
      }
      
   $args=array('order'=> 'DESC', 
               'posts_per_page'=>5,
               'post_date' => date("Y-m-d"), 
               'category_name' => $cat
              );
$post_number=1;
   $query=new WP_Query($args);

    if( $query->have_posts()): 
    while( $query->have_posts()): $query->the_post();
     {
       if($post_number==1){
         $col=4;
         $type="new_post";
       }else{
         $col=2;
         $type="old_post";
         
       }
       $time= $post_number*500;
       $link = get_the_permalink();
  echo '<div data-aos="fade-up"
     data-aos-duration="' . $time . '" class="no_padding col-12 col-md-' . $col .' post post_number_' . $post_number . '"><a href=' . $link . '><div class="' . $type . '">';
    
       if ( has_post_thumbnail() ) {
            the_post_thumbnail('full');
        } else {
            echo '<p>Brak obrazu</p>';
        }
      echo  '<div class="post_title_div">';
      echo '<p>' . get_the_date() .'</p>';
      echo '<h2>' . $post->post_title . '</h2>';
      echo '<div class="more_button"><a href="' . $link . '">Więcej</a>';
       echo '</div></div></div></div></a>';
       $post_number++;
     }
    endwhile; 
    else:
    endif;
      ?>

    </div>
  </div><!-- #page-wrapper -->
</section>
<?php get_footer();
