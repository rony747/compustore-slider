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
class Compu_Slider_Admin
{

  private $plugin_name;
  private $version;

  public function __construct($plugin_name, $version)
  {

    $this -> plugin_name = $plugin_name;
    $this -> version     = $version;
    add_action('init', [$this, 'register_compu_slider_cpt']);
    add_action('admin_menu', [$this, 'compu_slider_settings_page']);
    $this -> compu_slider_settings_loader();

  }

//	public function enqueue_styles() {
//
//		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/compu-slider-admin.css', array(), $this->version, 'all' );
//
//	}
//	public function enqueue_scripts() {
//
//		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/compu-slider-admin.js', array( 'jquery' ), $this->version, false );
//
//	}
  function register_compu_slider_cpt()
  {
    require_once COMPU_SLIDER_BASE_DIR . 'includes/class-compu-slider-post-type.php';
    // Register CPT
    $plugin_post_type = new Compu_Slider_Custom_Post(COMPU_SLIDER_NAME, COMPU_SLIDER_VERSION);
    $plugin_post_type -> init();
    // Flush permalinks
    flush_rewrite_rules();

  }

  function compu_slider_settings_page()
  {
    add_submenu_page('edit.php?post_type=compu-slider', 'Slider Settings', 'Slider Settings', 'manage_options', 'compu_slider_settings', [
      $this,
      'compu_slider_settings_callback'
    ]);
  }

  function compu_slider_settings_callback()
  {
    include_once plugin_dir_path(__FILE__) . 'partials/compu-slider-admin-display.php';
  }

  function compu_slider_settings_loader()
  {
    require_once COMPU_SLIDER_BASE_DIR . 'includes/class-slider-settings.php';
    $settingClass = new Compu_Slider_Settings(COMPU_SLIDER_NAME, COMPU_SLIDER_VERSION);
    $settingClass -> init();
  }




}
