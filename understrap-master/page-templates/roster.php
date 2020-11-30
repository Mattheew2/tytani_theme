<?php

/**
 * Template Name: Roster
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<section class="roster">
  <h1 class="content_title"><?php echo get_the_title(); ?></h1>
  <div class="roster_table table-responsive">
    <table class="table">
      <thead>
        <tr>


          <?php

          if (have_rows('col_head')) :
            while (have_rows('col_head')) : the_row();
              for ($x = 1; $x <= 9; $x++) {
                $t = 'col_head_' . $x;
                echo '<th scope="col" class="player_head ' . $t . '">' . get_sub_field($t) . '</th>';
              }

            endwhile;
          else :
          // no rows found
          endif;
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $players_custom_fields = array(
          'number',
          'name',
          'last_name',
          'position',
          'height',
          'weight',
          'age',
          'exp',
          'last_team'
        );

        $players = array(
          'post_type' => 'players',
          'posts_per_page' => -1,
          'orderby'      => 'meta_value_num',
          'meta_key' => 'number',
          'order'        => 'ASC'

        );
        $the_query = new WP_Query($players); ?>

        <?php if ($the_query->have_posts()) : ?>
          <!-- pagination here -->
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <tr>
              <?php foreach ($players_custom_fields as $pcf) {
              ?>
                <td class="player_col <?php echo $pcf; ?> player_col"><?php the_field($pcf); ?></td>
              <?php
              } ?>
            </tr>
          <?php endwhile; ?>
          <!-- pagination here -->
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

      </tbody>
    </table>







  </div>
</section>
<?php
get_footer();
?>

<script>
  /*
jQuery(document).ready(function () {
  jQuery(".pop").mouseenter(function () {
    jQuery(".pop_show").slideDown();
  });
  jQuery(".pop").mouseleave(function () {
    jQuery(".pop_show").slideUp();
  });
});

*/
</script>