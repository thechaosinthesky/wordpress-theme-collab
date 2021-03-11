<?php

// Custom settings page on dashboard, for site wide contact info

function my_admin_page_contents() {
    ?>
    <h1> <?php esc_html_e( 'Site Contact Fields', 'my-plugin-textdomain' ); ?> </h1>
    <form method="POST" action="options.php">
    <?php
    settings_fields( 'sample-page' );
    do_settings_sections( 'sample-page' );
    submit_button();
    ?>
    </form>
    <?php
}

function my_admin_menu() {
	add_menu_page(
		__( 'Contact Info', 'my-textdomain' ),
		__( 'Contact Info', 'my-textdomain' ),
		'manage_options',
		'sample-page',
		'my_admin_page_contents',
		'dashicons-schedule',
		50
	);
}
add_action( 'admin_menu', 'my_admin_menu' );


function my_setting_section_callback_function() {
  echo '<p>Add the site contact phone number to be displayed.</p>';
}

function phone_setting_markup() {
  ?>
  <label for="phone_field"><?php _e( 'Phone number', 'my-textdomain' ); ?></label>
  <input type="text" id="phone_field" name="phone_field" value="<?php echo get_option( 'phone_field' ); ?>">
  <?php
}

function contact_settings_init() {
  add_settings_section(
    'sample_page_setting_section',
    __( 'Custom settings', 'my-textdomain' ),
    'my_setting_section_callback_function',
    'sample-page'
  );

  add_settings_field(
   'phone_field',
   __( 'Phone number', 'my-textdomain' ),
   'phone_setting_markup',
   'sample-page',
   'sample_page_setting_section'
	);

  register_setting( 'sample-page', 'phone_field' );
}

add_action( 'admin_init', 'contact_settings_init' );
