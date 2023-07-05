<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://tirony.me
 * @since      1.0.0
 *
 * @package    Compu_Slider
 * @subpackage Compu_Slider/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Compu_Slider
 * @subpackage Compu_Slider/admin
 * @author     t.i.rony <touhid_rony@yahoo.com>
 */
class Compu_Slider_Settings {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {

		$this -> plugin_name = $plugin_name;
		$this -> version     = $version;
	}

	public function init() {
		add_action( 'admin_init', [ $this, 'compu_slider_settings_init' ] );
	}

	function compu_slider_settings_init() {
		register_setting( 'compu_slider_setting_group', 'compustore_slider_settings' );

		add_settings_section('compu_slider_setting_section',__('Compustore Slider Settings','compu-slider'),[$this,'compu_slider_settings_section_callback'],'compu_slider_settings');

    // Setting fields

		add_settings_field(
			'cs_slider_speed',
			__( 'Slider delay', 'compu-slider' ),
			[$this,'cs_slider_speed_callback'],
			'compu_slider_settings',
			'compu_slider_setting_section'
		);
    ////////////////////////////////

	}

	function cs_slider_speed_callback() {
		$options = get_option( 'compustore_slider_settings' ) ;
	  $value = isset($options['cs_slider_speed']) ? $options['cs_slider_speed'] : '';
	  ?>
      <input type='number' name='compustore_slider_settings[cs_slider_speed]' value='<?php echo $value; ?>'>
		<?php
	}



	function compu_slider_settings_section_callback() {
		echo __( 'Change your slider settings from here', 'compu-slider' );
	}



}
