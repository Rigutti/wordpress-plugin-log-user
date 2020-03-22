<?php
function your_function( $user_login, $user )
{
  $IdUtente = $user->ID;


  $ip= "Not found";
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
    $ip = $_SERVER['HTTP_CLIENT_IP']; //check ip from share internet
  else
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; //to check ip is pass from proxy
      else
        $ip = $_SERVER['REMOTE_ADDR'];



  global $wpdb;
  $result = $wpdb->get_results( "INSERT INTO `JTODB779k_log`( `id_user`,`ip`) VALUES ($IdUtente,\"$ip\")");
}
add_action('wp_login', 'your_function', 10, 2);
