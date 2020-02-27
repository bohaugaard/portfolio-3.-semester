<?php

namespace CocoBasicElements\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\utils;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class coco_skills_circle extends Widget_Base {

    public function get_name() {
        return 'coco-skills-circle';
    }

    public function get_title() {
        return esc_html__('Skills Circle', 'cocobasic-elementor');
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
            'label' => esc_attr__('Content', 'cocobasic-elementor'),
                ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
                'title', [
            'label' => esc_attr__('Title', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('Design', 'cocobasic-elementor'),
                ]
        );

        $repeater->add_control(
                'value', [
            'label' => esc_attr__('Percent', 'cocobasic-elementor'),
            'type' => Controls_Manager::TEXT,
            'label_block' => true,
            'default' => esc_attr__('57', 'cocobasic-elementor'),
                ]
        );

        $this->add_control(
                'items', [
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'prevent_empty' => false,
            'default' => [
                [
                    'title' => esc_attr__('Design', 'cocobasic-elementor'),
                ]
            ],
            'title_field' => '{{{ title }}}',
                ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
                'section_general', [
            'label' => esc_attr__('General', 'cocobasic-elementor'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'percent_num_typographya',
            'label' => esc_attr__('Percent Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .skill-circle-num',
                ]
        );

        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_attr__('Title Typography', 'cocobasic-elementor'),
            'selector' => '{{WRAPPER}} .skill-circle-text',
                ]
        );

        $this->add_control(
                'circle_percent_color', [
            'label' => esc_attr__('Percent color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [                
                '{{WRAPPER}} span.skill-circle-num' => 'color: {{VALUE}};',                                
            ],
                ]
        );
       
        $this->add_control(
                'circle_title_color', [
            'label' => esc_attr__('Title color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .skill-circle-text' => 'color: {{VALUE}};',                
            ],
                ]
        );
        
        $this->add_control(
                'circle_color', [
            'label' => esc_attr__('Circle color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [],
                ]
        );

        $this->add_control(
                'color_empty', [
            'label' => esc_attr__('Empty Circle color', 'cocobasic-elementor'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [],
                ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        require dirname(__FILE__) . '/view.php';
    }

    private function content($content) {
        $out = '';

        $settings = $this->get_settings_for_display();
        $color = $settings['circle_color'] ? $settings['circle_color'] : '#f37b83';
        $colorEmpty = $settings['color_empty'] ? $settings['color_empty'] : '#554247';

        foreach ($content as $item) {

            $title = $item['title'] ? $item['title'] : '';
            $value = $item['value'] ? $item['value'] * 0.01 : '50';

            $out .= '
                <div class="skill-circle">
                    <div class="skill-circle-wrapper relative" data-value="' . $value . '" data-color="' . $color . '" data-empty-color="' . $colorEmpty . '">
                        <span class="skill-circle-num"></span>                                            
                    </div>                    
                    <p class="skill-circle-text">' . $title . '</p>
                </div>                
            ';
        }

        return $out;
    }

}

$widgets_manager->register_widget_type(new \CocoBasicElements\Widgets\coco_skills_circle());
