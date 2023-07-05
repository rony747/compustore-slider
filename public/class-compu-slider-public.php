<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://tirony.me
 * @since      1.0.0
 *
 * @package    Compu_Slider
 * @subpackage Compu_Slider/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Compu_Slider
 * @subpackage Compu_Slider/public
 * @author     t.i.rony <touhid_rony@yahoo.com>
 */
class Compu_Slider_Public
{

  /**
   * The ID of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string $plugin_name The ID of this plugin.
   */
  private $plugin_name;

  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string $version The current version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   *
   * @param string $plugin_name The name of the plugin.
   * @param string $version The version of this plugin.
   *
   * @since    1.0.0
   */
  public function __construct($plugin_name, $version)
  {

    $this -> plugin_name = $plugin_name;
    $this -> version     = $version;
    add_shortcode('compustore_slider', [$this, 'compu_slider_shortcode']);

  }

  /**
   * Register the stylesheets for the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function enqueue_styles()
  {

		wp_register_style( 'compu_slider_swiper_css', plugin_dir_url( __FILE__ ) . 'css/swiper.css', array(), $this -> version, 'all' );
    wp_register_style('compu_slider_custom', plugin_dir_url(__FILE__) . 'css/compu-slider-public.css', array(), $this -> version, 'all');


  }

  public function enqueue_scripts()
  {
    $options = get_option( 'compustore_slider_settings' ) ;
    $value = isset($options['cs_slider_speed']) ? $options['cs_slider_speed'] : 5000;
    wp_register_script('compu_slider_custom_swiper_js', plugin_dir_url(__FILE__) . 'js/swiper.js', array(), $this -> version, true);
    wp_register_script('compu_slider_custom', plugin_dir_url(__FILE__) . 'js/compu-slider-public.js', array('jquery'), $this -> version, true);
    wp_localize_script('compu_slider_custom', 'compuSlider',
      array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'sliderSpeed' => $value,
    ));
  }


  public function compu_slider_shortcode()
  {
    wp_enqueue_style('compu_slider_swiper_css');
    wp_enqueue_style('compu_slider_custom');
    wp_enqueue_script('compu_slider_custom_swiper_js');
    wp_enqueue_script('compu_slider_custom');
    $output = '';
    ob_start();
    $args      = [
      'post_type'      => array('compu-slider'),
      'post_status'    => array('publish'),
      'posts_per_page' => '15',
    ];
    $the_query = new WP_Query($args);
    if ( $the_query -> have_posts() ) { ?>

      <div class="compu_slider_container">
        <div class="compu_slider_wrapper">
          <!-- Slider main container -->
          <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              <?php
              while ($the_query -> have_posts()) {
                $the_query -> the_post();
                ?>
                <div class="swiper-slide compu_single_slide"><?php the_content(); ?></div>
                <?php
              } ?>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <!--                <div class="swiper-button-prev"></div>-->
            <!--                <div class="swiper-button-next"></div>-->
          </div>
        </div>
      </div>
      <?php
      $output = ob_get_clean();
    } else {
      esc_html_e('Sorry, no slide to show.');
    }
// Restore original Post Data.
    wp_reset_postdata();
    return $output;
  }


}
