<?php
namespace Elementor;

class My_Widget_1 extends Widget_Base {

  public function get_name() {
    return 'shortcode-widget';
  }

  public function get_title() {
    return 'Shortcode Widget';
  }

  public function get_icon() {
    return 'eicon-code';
  }

  public function get_categories() {
    return [ 'general' ];
  }

  protected function _register_controls() {

    $this->start_controls_section(
      'section_title',
      [
        'label' => __( 'Content', 'elementor' ),
      ]
    );



    $this->end_controls_section();
  }

  protected function render() {

    echo do_shortcode( '[compustore_slider]' );


  }

  protected function _content_template() {

  }


}