<?php
if ( ! defined( 'ABSPATH' ) ) exit; 

global $admin_page_hooks;

if( !isset($admin_page_hooks['vp-dashboard.php']) ){
  add_action( 'admin_menu', 'vpp_console' );

  function vpp_console(){

    $logo = 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 841.9 481.9"><path fill="black" d="M4.9 36.8l136.3-.2 176.5 192.2V36.6h97.7l.1 401.4-97.5-58.7zm759-.2h-339V438l97.9-58.9 1-114.6h227.9l85.7-123-73.5-104.9zm-52.7 149.7H523.1v-73h187.7l25.7 35.1-25.3 37.9z"/></svg>');

    add_menu_page( 'VALKO.PRO', 'VALKO.PRO', 'manage_options', 'vp-dashboard.php', 'vpp_dashboard_content', $logo, "99.9"); 
  };

  function vpp_dashboard_content() { 
    $dashboard = "<div class='wrap'>";
    $dashboard .= "<h2>Support:</h2>";
    $dashboard .= "<a href='mailto:oleg@valko.pro'>oleg@valko.pro</a><br />";
    $dashboard .= "<a href='https://valko.pro'>valko.pro</a>";
    $dashboard .= "</div>";
    echo $dashboard;
   };
};