<?php
$id = get_the_id();

if ($id == 5 || $post->post_parent == 5) {
  $column = 9;
  $column_xl = 8;
  $menu_type = '[widget id="nav_menu-2"]';
  echo '#menu-item-18{background-image:url("' . site_url() . '/wp-content/themes/understrap-master/css/BG_images/logo_tytani_small.png"); width:160px;}';
  echo '#menu-item-18 a {opacity: 0;}';
  $cat = 'tytani';
} else {
  /*echo '#menu-item-18 {height:50px;
     background-image:url("' . site_url() . '/wp-content/themes/understrap-master/css/BG_images/logo_tytani_small.png"); background-size:cover;width:160px;height:50px;}';
  echo '#menu-item-18 a {opacity: 0;height:100%;}';*/
}

if ($id == 9 || $post->post_parent == 9) {
  $column = 8;
  $column_xl = 7;
  $menu_type = '[widget id="nav_menu-5"]';
  echo '#menu-item-21 {
      background-image: url("' . site_url() . '/wp-content/uploads/2020/09/120115598_2497224710569033_4207984053901570148_n.png") !important; background-size:cover !important; width:160px;
    }
    #menu-item-21 a {
      opacity: 0;
    }';
}

if ($id == 14 || $post->post_parent == 14) {
  $column = 6;
  $column_xl = 6;
  $menu_type = '[widget id="nav_menu-6"]';
  echo '#menu-item-20 {
      background-image: url("' . site_url() . '/wp-content/uploads/2020/07/107829621_1223029644705825_8268825658786452049_n.png") !important; background-size:cover !important; width:160px;
    }
    #menu-item-20 a {
      opacity: 0;
    }';
}

if ($id == 11 || $post->post_parent == 11) {
  $column = 5;
  $column_xl = 5;
  $menu_type = '[widget id="nav_menu-4"]';
  echo '#menu-item-22 {
      background-image: url("' . site_url() . '/wp-content/uploads/2020/07/107636227_308029543705561_8167619475226510032_n.png") !important; background-size:cover !important; width:160px;
    }
    #menu-item-22 a {
      opacity: 0;
    }';
}
