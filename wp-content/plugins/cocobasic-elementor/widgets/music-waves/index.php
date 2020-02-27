<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_music_waves extends Widget_Base {

    public function get_name() {
        return 'coco-music-waves';
    }

    public function get_title() {
        return esc_html__('Music Waves', 'cocobasic-elementor');
    }

    public function get_icon() {
        return 'fa fa-th';
    }

    public function get_categories() {
        return array('coco-element');
    }

    protected function _register_controls() {

        $this->start_controls_section(
                'section_music_waves', [
            'label' => esc_attr__('Content', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'audio_url', [
            'label' => esc_html__('Select Audio File:', 'cocobasic-elementor'),
            'type' => Controls_Manager::MEDIA,
            'media_type' => 'audio',
            'label_block' => true,
                ]
        );

        $this->add_control(
                'wave_text', [
            'label' => __('Text', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('SOUND', 'cocobasic-elementor'),
                ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
                'section_general', [
            'label' => esc_attr__('General', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );


        $this->add_control(
                'music_waves_color', [
            'label' => esc_attr__('Waves Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} span' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'text_color', [
            'label' => __('Text Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .music-waves-text' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'text_typography',
            'label' => __('Text Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .music-waves-text',
                ]
        );


        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_music_waves());
