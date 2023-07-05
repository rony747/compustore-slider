<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://tirony.me
 * @since      1.0.0
 *
 * @package    Compu_Slider
 * @subpackage Compu_Slider/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1>Shortcode: [compustore_slider]</h1>
<hr>

<div class="wrap">
  <form action='options.php' method='post'>

	  <?php
	  settings_fields( 'compu_slider_setting_group' );
	  do_settings_sections( 'compu_slider_settings' );
	  submit_button();
	  ?>

  </form>
</div>