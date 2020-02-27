<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_portfolio extends Widget_Base {

    public function get_name() {
        return 'coco-portfolio';
    }

    public function get_title() {
        return __('Portfolio', 'cocobasic-elementor');
    }

    public function get_icon() {
        return 'fa fa-th';
    }

    public function get_categories() {
        return array('coco-element');
    }

    protected function _register_controls() {

        $this->start_controls_section(
                'section_process_1', [
            'label' => __('Content', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'num', [
            'label' => __('Number of items to show (for all set -1)', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('-1', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'all_text', [
            'label' => __('"All" text', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('All', 'cocobasic-elementor'),
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
                'overlay_color', [
            'label' => __('Item overlay color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .portfolio-text-holder' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'title_color', [
            'label' => __('Title color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .portfolio-text' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => __('Text Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .portfolio-text',
                ]
        );

        $this->add_control(
                'category_color', [
            'label' => __('Category color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .portfolio-cat' => 'color: {{VALUE}};',
                '{{WRAPPER}} .portfolio-cat:before' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'category_typography',
            'label' => __('Category Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .portfolio-cat',
                ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
                'section_filter_color', [
            'label' => esc_attr__('Filter Button Collors', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_control(
                'filter_lines_color', [
            'label' => __('Filter Lines Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .category-filter-icon' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .category-filter-icon:before' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .category-filter-icon:after' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .category-filter-list .button.is-checked' => 'color: {{VALUE}};',
            ],
                ]
        );

        $this->add_control(
                'filter_open_background', [
            'label' => __('Opened Filter Background Color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .category-filter-list' => 'background-color: {{VALUE}};',
            ],
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'filter_text_typography',
            'label' => __('Filter Text Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .category-filter-list',
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_portfolio());
