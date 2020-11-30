<?php
/**
 * Template Name: Podstrona
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
        <?php 
    for($x=1;$x<=10;$x++){
      $line='line_' . $x;
       if( have_rows($line) ):
    while ( have_rows($line) ) : the_row();
      if (get_sub_field('title')!="") {

      echo '<h2 class="show" number="' . $x . '">' . get_sub_field('title') .  '</h2>';}
    endwhile;
else :
    // no rows found
endif;}    ?></div>

      <div class="col-12 col-md-8 about_content">
        <?php 
    for($x=1;$x<=10;$x++){
      if(!isset($_GET['pos']) and $x==1){$hide=' ';}
      elseif($x==$_GET['pos']){
          $hide=' ';
      }else{$hide='hide';}
      $line='line_' . $x;
       if( have_rows($line) ):
    while ( have_rows($line) ) : the_row();
       echo '<div class="hiding_port ' . $hide . '" number="' . $x . '"><h1 class="content_title">' . get_sub_field('title') . '</h1>';
      echo '<div>' . get_sub_field('content') . '</div></div>';
    endwhile;
else :
    // no rows found
endif;}    ?>
      </div>
</div>
  </div>
</section>
<?php
get_footer();
?>
<script>
jQuery(document).ready(function () {
  jQuery(".show").click(function () {
    var num = jQuery(this).attr("number");
    jQuery(".hiding_port").slideUp();
    jQuery(".hiding_port[number=" + num + "]").slideDown();  jQuery(".show").removeClass("active_pos");
   jQuery(this).addClass('active_pos');
    var url = window.location.href.split('?')[0];
    var url2 = window.location.href;
    
    window.history.pushState("", "",url + "?pos=" + num);
 });
});


</script>