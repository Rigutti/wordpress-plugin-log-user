<?php

add_action('wp_dashboard_setup', 'Custom_dashboard_for_login');

function Custom_dashboard_for_login()
{
  global $wp_meta_boxes;
  wp_add_dashboard_widget('Custom_dashboard_for_login_last_login', 'Ultimi Login', 'Custom_dashboard_for_login_callback');
}

function Custom_dashboard_for_login_callback()
{
  global $wpdb;
  $result = $wpdb->get_results( "SELECT * FROM `wp_users` as `user` inner join (SELECT id_user, data, IP FROM `wp_log` WHERE id IN ( SELECT MAX(id) FROM `wp_log` GROUP BY id_user)) as `log` where log.id_user=user.ID ");
  //echo print_r($result);
  foreach ($result as $login_persona)
    echo "<div style='border-left:5px solid gray; margin-bottom:5px; padding-left:2px; font-weight:bold;'>Nome: ".$login_persona->display_name."</br>Data: ".$login_persona->data."</br>Ip: ".$login_persona->IP."</div>";
}
