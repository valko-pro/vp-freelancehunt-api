<?php
if ( ! defined( 'ABSPATH' ) ) exit; 

add_action('admin_menu', 'vppfa_add_submenu_page');
function vppfa_add_submenu_page() {
add_submenu_page(
  'vp-dashboard.php',
  'VP+ Freelancehunt',
  'Freelancehunt',
  'manage_options',
  'vpp-freelancehunt.php',
  'vppfa_page_content'
);
};

function vppfa_page_content() {
  ?>
  <div class="wrap">
    <h2><?php echo get_admin_page_title() ?></h2>

    <form action="options.php" method="POST">
      <?php
        settings_fields( 'vppfa_option_group' );    
        do_settings_sections( 'vpp-freelancehunt.php' ); 
        submit_button();
      ?>
    </form>
  </div>
  <?php
}

add_action( 'admin_init', 'vppfa_options' );

function vppfa_options() {
  add_settings_section(
    'vppfa_api_section',
    'VP+ Freelancehunt API',
    'vppfa_section_description',
    'vpp-freelancehunt.php'
  );

  add_settings_field(
    'vppfa_token_field',
    'Token',
    'vppfa_token_field_html',
    'vpp-freelancehunt.php',
    'vppfa_api_section'
  );

  add_settings_field(
    'vppfa_secret_key_field',
    'Secret Key',
    'vppfa_secret_key_field_html',
    'vpp-freelancehunt.php',
    'vppfa_api_section'
  );

  register_setting('vppfa_option_group', 'vppfa_token_field' );
  register_setting('vppfa_option_group', 'vppfa_secret_key_field' );

};

function vppfa_section_description() {
  echo '<p>This settings section added from plugin - VP+ Freelancehunt API</p>';
};

function vppfa_token_field_html() {
  echo '<input
  name="vppfa_token_field" 
  type="text" 
  value="' . get_option('vppfa_token_field') . '" 
  />';
};

function vppfa_secret_key_field_html() {
  echo '<input
  name="vppfa_secret_key_field" 
  type="text" 
  value="' . get_option('vppfa_secret_key_field') . '" 
  />';
};