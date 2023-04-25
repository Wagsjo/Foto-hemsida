<?php

function acf_load_nav_menus( $field ) {

   // reset choices
   $field['choices'] = array();

   $menus = wp_get_nav_menus();
   
   // loop through array and add to field 'choices'
   if( is_array($menus) ) {
      foreach( $menus as $menu ) {
         $field['choices'][ $menu->slug ] = $menu->name;
      }
   }
   return $field;
   
}
add_filter('acf/load_field/name=nav_menu', 'acf_load_nav_menus');
