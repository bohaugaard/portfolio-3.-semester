<?php
/*
 * Register Theme Customizer
 */

add_action('customize_register', 'cocobasic_customize_register');
add_action('customize_controls_enqueue_scripts', 'cocobasic_customize_control_js');

function cocobasic_customize_register($wp_customize) {

    function cocobasic_clean_html($value) {
        $allowed_html_array = cocobasic_allowed_html();
        $value = wp_kses($value, $allowed_html_array);
        return $value;
    }

    function cocobasic_sanitize_select($input, $setting) {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return ( array_key_exists($input, $choices) ? $input : $setting->default );
    }

    class CocoBasicWP_Customize_Textarea_Control extends WP_Customize_Control {

        public $type = 'textarea';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }

    }

    //------------------------- MENU SECTION ---------------------------------------------

    $wp_customize->add_section('cocobasic_menu_settings', array(
        'title' => esc_html__('Sidebar / Menu Settings', 'volos-wp'),
        'priority' => 30
    ));


    $wp_customize->add_setting('cocobasic_select_sidebar_content', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'cocobasic_sanitize_select',
        'default' => '',
    ));


    $wp_customize->add_control('cocobasic_select_sidebar_content', array(
        'type' => 'select',
        'section' => 'cocobasic_menu_settings',
        'label' => esc_html__('Sidebar Content', 'volos-wp'),
        'description' => esc_html__('select one of Elementor Library templates', 'volos-wp'),
        'choices' => cocobasic_create_elementor_library_list()
    ));


    $wp_customize->add_setting('cocobasic_show_section_num', array(
        'default' => 'no',
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control('cocobasic_show_section_num', array(
        'label' => esc_html__('Show Top Sections Numbers', 'volos-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_show_section_num',
        'type' => 'radio',
        'choices' => array(
            'yes' => esc_html__('Yes', 'volos-wp'),
            'no' => esc_html__('No', 'volos-wp'),
    )));


    $wp_customize->add_setting('cocobasic_show_title', array(
        'default' => 'yes',
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control('cocobasic_show_title', array(
        'label' => esc_html__('Show Site Title', 'volos-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_show_title',
        'type' => 'radio',
        'choices' => array(
            'yes' => esc_html__('Yes', 'volos-wp'),
            'no' => esc_html__('No', 'volos-wp'),
    )));


    $wp_customize->add_setting('cocobasic_show_desc', array(
        'default' => 'yes',
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control('cocobasic_show_desc', array(
        'label' => esc_html__('Show Site Description', 'volos-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_show_desc',
        'type' => 'radio',
        'choices' => array(
            'yes' => esc_html__('Yes', 'volos-wp'),
            'no' => esc_html__('No', 'volos-wp'),
    )));


    $wp_customize->add_setting('cocobasic_show_big_number', array(
        'default' => 'no',
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control('cocobasic_show_big_number', array(
        'label' => esc_html__('Show Big Number', 'volos-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_show_big_number',
        'type' => 'radio',
        'choices' => array(
            'yes' => esc_html__('Yes', 'volos-wp'),
            'no' => esc_html__('No', 'volos-wp'),
    )));


    $wp_customize->add_setting('cocobasic_show_scroll', array(
        'default' => 'no',
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control('cocobasic_show_scroll', array(
        'label' => esc_html__('Show Scroll Animation', 'volos-wp'),
        'section' => 'cocobasic_menu_settings',
        'settings' => 'cocobasic_show_scroll',
        'type' => 'radio',
        'choices' => array(
            'yes' => esc_html__('Yes', 'volos-wp'),
            'no' => esc_html__('No', 'volos-wp'),
    )));


    //------------------------- END MENU SECTION ---------------------------------------------
    //
    //    
    //            
    //
    //
    //----------------------------- IMAGE SECTION  ---------------------------------------------

    $wp_customize->add_section('cocobasic_image_section', array(
        'title' => esc_html__('Images Section', 'volos-wp'),
        'priority' => 33
    ));


    $wp_customize->add_setting('cocobasic_preloader', array(
        'default' => get_template_directory_uri() . '/images/preloader.gif',
        'capability' => 'edit_theme_options',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cocobasic_preloader', array(
        'label' => esc_html__('Preloader Gif', 'volos-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_preloader'
    )));

    $wp_customize->add_setting('cocobasic_preloader_width', array(
        'default' => "50px",
        'sanitize_callback' => 'cocobasic_clean_html'
    ));

    $wp_customize->add_control('cocobasic_preloader_width', array(
        'label' => esc_html__('Preloader Width:', 'volos-wp'),
        'section' => 'cocobasic_image_section',
        'settings' => 'cocobasic_preloader_width'
    ));

    //----------------------------- END IMAGE SECTION  ---------------------------------------------
    //
    //
    //
    //---------------------------------- COLORS SECTION --------------------


    function cocobasic_get_color_scheme_choices() {
        $color_schemes = cocobasic_get_color_schemes();
        $color_scheme_control_options = array();

        foreach ($color_schemes as $color_scheme => $value) {
            $color_scheme_control_options[$color_scheme] = $value['label'];
        }

        return $color_scheme_control_options;
    }

    function cocobasic_get_color_schemes() {
        return apply_filters('cocobasic_color_schemes', array(
            'demo1' => array(
                'label' => __('Demo 1', 'volos-wp'),
                'colors' => array(
                    '#362B2E',
                    '#302729',
                    '#a88590',
                    '#f37b83',
                    '#c6646b',
                    '#faefff',
                    '#362B2E',                    
                    '#ffffff'
                ),
            ),
            'demo2' => array(
                'label' => __('Demo 2', 'volos-wp'),
                'colors' => array(
                    '#13111b',
                    '#1a1925',
                    '#d8d7db',
                    '#c5945c',
                    '#d8af81',
                    '#ffffff',
                    '#13111b',                    
                    '#ffffff'
                ),
            ),
            'demo3' => array(
                'label' => __('Demo 3', 'volos-wp'),
                'colors' => array(
                    '#232329',
                    '#2e2e38',
                    '#ffffff',
                    '#6db363',
                    '#60a058',
                    '#ffffff',
                    '#232329',                    
                    '#ffffff'
                ),
            )
        ));
    }

    $wp_customize->add_setting('color_scheme', array(
        'default' => 'light',
        'sanitize_callback' => 'cocobasic_clean_html',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('color_scheme', array(
        'label' => __('Base Color Scheme', 'volos-wp'),
        'section' => 'colors',
        'type' => 'select',
        'choices' => cocobasic_get_color_scheme_choices(),
        'priority' => 1,
    ));


    $wp_customize->add_setting('cocobasic_preloader_background_color', array(
        'default' => '#362B2E',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_preloader_background_color', array(
        'label' => esc_html__('Preloader Background Color', 'volos-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_preloader_background_color'
    )));


    $wp_customize->add_setting('cocobasic_body_background_color', array(
        'default' => '#302729',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_body_background_color', array(
        'label' => esc_html__('Body Background Color', 'volos-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_body_background_color'
    )));


    $wp_customize->add_setting('cocobasic_global_color1', array(
        'default' => '#a88590',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_global_color1', array(
        'label' => esc_html__('Global Color 1', 'volos-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_global_color1'
    )));


    $wp_customize->add_setting('cocobasic_global_color2', array(
        'default' => '#f37b83',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_global_color2', array(
        'label' => esc_html__('Global Color 2', 'volos-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_global_color2'
    )));


    $wp_customize->add_setting('cocobasic_global_color3', array(
        'default' => '#c6646b',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_global_color3', array(
        'label' => esc_html__('Global Color 3', 'volos-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_global_color3'
    )));

    
    $wp_customize->add_setting('cocobasic_global_color4', array(
        'default' => '#faefff',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_global_color4', array(
        'label' => esc_html__('Global Color 4', 'volos-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_global_color4'
    )));


    $wp_customize->add_setting('cocobasic_sidebar_background_color', array(
        'default' => '#362B2E',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_sidebar_background_color', array(
        'label' => esc_html__('Sidebar Background Color', 'volos-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_sidebar_background_color'
    )));

    
    $wp_customize->add_setting('cocobasic_menu_color', array(
        'default' => '#ffffff',
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'cocobasic_menu_color', array(
        'label' => esc_html__('Menu Color', 'volos-wp'),
        'section' => 'colors',
        'settings' => 'cocobasic_menu_color'
    )));


    //---------------------------------------- END COLORS SECTION ------------------------------------------------------
    //
    //
    //
    //---------------------------------- FOOTER SECTION --------------------

    if (function_exists('elementor_fail_php_version')) {

        $wp_customize->add_section('cocobasic_footer_section', array(
            'title' => esc_html__('Footer', 'volos-wp'),
            'priority' => 99
        ));

        $wp_customize->add_setting('cocobasic_select_footer', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'cocobasic_sanitize_select',
            'default' => '',
        ));


        $wp_customize->add_control('cocobasic_select_footer', array(
            'type' => 'select',
            'section' => 'cocobasic_footer_section',
            'label' => esc_html__('Custom footer layout', 'volos-wp'),
            'description' => esc_html__('select one of Elementor templates', 'volos-wp'),
            'choices' => cocobasic_create_elementor_library_list()
        ));
    }


    //---------------------------------------- END FOOTER SECTION ------------------------------------------------------
    //
    //
    //
    //
    //--------------------------------------------------------------------------
    $wp_customize->get_setting('cocobasic_preloader_background_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_body_background_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_menu_color')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_global_color1')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_global_color2')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_global_color3')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_global_color4')->transport = 'postMessage';
    $wp_customize->get_setting('cocobasic_sidebar_background_color')->transport = 'postMessage';    
    //--------------------------------------------------------------------------
    /*
     * If preview mode is active, hook JavaScript to preview changes
     */
    if ($wp_customize->is_preview() && !is_admin()) {
        add_action('customize_preview_init', 'cocobasic_customize_preview_js');
    }
}

/**
 * Bind Theme Customizer JavaScript
 */
function cocobasic_customize_preview_js() {
    wp_enqueue_script('cocobasic-customizer', get_template_directory_uri() . '/admin/js/custom-admin.js', array('customize-preview'), '', true);
}

function cocobasic_customize_control_js() {
    wp_enqueue_script('color-scheme-control', get_template_directory_uri() . '/admin/js/color-scheme-control.js', array('customize-controls'), '', true);
    wp_localize_script('color-scheme-control', 'colorScheme', cocobasic_get_color_schemes());
}

/*
 * Generate CSS Styles
 */

class CocoBasicLiveCSS {

    public static function cocobasic_theme_customized_style() {
        echo '<style id="cocobasic-customizer-style" type="text/css">' .
        cocobasic_generate_css('.doc-loader', 'background-color', 'cocobasic_preloader_background_color', '', '!important') .
        cocobasic_generate_css('body.ccb-css', 'background-color', 'cocobasic_body_background_color') .
        cocobasic_generate_css('.ccb-css .sm-clean a, .ccb-css .sm-clean a:hover, .ccb-css .sm-clean a:focus, .ccb-css .sm-clean a:active', 'color', 'cocobasic_menu_color') .
        cocobasic_generate_css('body.ccb-css, .ccb-css .widget a, .ccb-css .search-field', 'color', 'cocobasic_global_color1') .                
        cocobasic_generate_css('.ccb-css .search-field::-webkit-input-placeholder', 'color', 'cocobasic_global_color1') .
        cocobasic_generate_css('.ccb-css .search-field:-ms-input-placeholder', 'color', 'cocobasic_global_color1') .
        cocobasic_generate_css('.ccb-css .search-field::placeholder', 'color', 'cocobasic_global_color1') .
        cocobasic_generate_css('.ccb-css.single .nav-links:before', 'background-color', 'cocobasic_global_color1') .        
        cocobasic_generate_css('body.ccb-css a, .ccb-css .global-color, .ccb-css .timeline-event-date, .ccb-css .category-filter-list .button.is-checked, .ccb-css blockquote.wp-block-quote, .ccb-css h1, .ccb-css h2, .ccb-css h3, .ccb-css h4, .ccb-css h5, .ccb-css h6, .ccb-css .comments-holder .comment-author-date-replay-holder, .ccb-css .more-posts, .ccb-css .no-more-posts, .ccb-css .more-posts-loading', 'color', 'cocobasic_global_color2') .
        cocobasic_generate_css('.ccb-css .global-background-color, .ccb-css .menu-holder, .ccb-css .img-caption, .ccb-css li.timeline-event:before, .ccb-css li.timeline-event span.timeline-circle:after, .ccb-css .skill-fill, .ccb-css .category-filter-icon, .ccb-css .category-filter-icon:after, .ccb-css .category-filter-icon:before, .ccb-css .portfolio-text-holder, .ccb-css .owl-theme .owl-dots .owl-dot.active span, .ccb-css .close-icon, .ccb-css .comments-holder ul.children:before', 'background-color', 'cocobasic_global_color2') .
        cocobasic_generate_css('.ccb-css span.timeline-circle:before', 'border-color', 'cocobasic_global_color2') .
        cocobasic_generate_css('.ccb-css .current-num, .ccb-css .icon-scroll, .ccb-css .sm-clean a span.sub-arrow', 'color', 'cocobasic_global_color3') .
        cocobasic_generate_css('.ccb-css .icon-scroll:before, .ccb-css .sm-clean a:after', 'background-color', 'cocobasic_global_color3') .
        cocobasic_generate_css('.ccb-css .current-big-num', '-webkit-text-stroke-color', 'cocobasic_global_color3') .
        cocobasic_generate_css('.ccb-css .total-pages-num, .ccb-css .comment-date, .ccb-css .archive-title h1, .ccb-css li.timeline-event:hover, .ccb-css .category-filter-list, .ccb-css .portfolio-text, .ccb-css .portfolio-cat', 'color', 'cocobasic_global_color4') .
        cocobasic_generate_css('.ccb-css #toggle:before, .ccb-css #toggle:after, .ccb-css #toggle .menu-line, .ccb-css .pagination-div:after, .ccb-css .portfolio-cat:before, .ccb-css .owl-theme .owl-dots .owl-dot span, .ccb-css .owl-theme .owl-dots .owl-dot:hover span', 'background-color', 'cocobasic_global_color4') .
        cocobasic_generate_css('.ccb-css .header-holder, .ccb-css .icon-scroll:after', 'background-color', 'cocobasic_sidebar_background_color') .
        cocobasic_generate_additional_css() .
        '</style>';
    }

}

/*
 * Generate CSS Class - Helper Method
 */

function cocobasic_generate_css($selector, $style, $mod_name, $prefix = '', $postfix = '', $rgba = '') {
    $return = '';
    $mod = get_option($mod_name);
    if (!empty($mod)) {
        if ($rgba === true) {
            $mod = '0px 0px 50px 0px ' . cardea_hex2rgba($mod, 0.65);
        }
        $return = sprintf('%s { %s:%s; }', $selector, $style, $prefix . $mod . $postfix
        );
    }
    return $return;
}

function cocobasic_generate_additional_css() {
    $allowed_html_array = cocobasic_allowed_html();
    $return = '';
    if (get_theme_mod('cocobasic_preloader_width') != ''):
        $return .= '.ccb-css .doc-loader img{width: ' . get_theme_mod('cocobasic_preloader_width') . ';}';
    endif;
    $return = wp_strip_all_tags($return);
    return $return;
}

function cocobasic_create_elementor_library_list() {

    $listArray = ['' => ''];

    global $post;

    $elementorLoop = new WP_Query(array(
        'post_type' => 'elementor_library',
        'post_status' => 'publish',
        'posts_per_page' => '-1'
    ));

    while ($elementorLoop->have_posts()) : $elementorLoop->the_post();
        $listArray += [ $post->ID => $post->post_name];
    endwhile;

    wp_reset_query();
    return $listArray;
}
?>