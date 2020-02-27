<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>        
        <meta charset="<?php bloginfo('charset'); ?>" />        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />  		
        <?php wp_head(); ?>        
    </head>    
    <body <?php body_class(); ?>>

        <div class="doc-loader">
            <?php if (get_option('cocobasic_preloader') !== ''): ?>                
                <img src="<?php echo esc_url(get_option('cocobasic_preloader', get_template_directory_uri() . '/images/preloader.gif')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
            <?php endif; ?>
        </div>  


        <div class="header-holder">
            <div class="header-wrapper">                     
                <header>
                    <div class="toggle-holder">
                        <div id="toggle">
                            <div class="menu-line"></div>
                        </div>
                    </div>  


                    <?php if (get_theme_mod('cocobasic_show_section_num') === 'yes'): ?>                
                        <div class="top-pagination">
                            <div class="current-num">
                                <span>01</span>                                    
                            </div>
                            <div class="pagination-div"></div>
                            <div class="total-pages-num"></div>
                        </div>
                    <?php endif; ?>

                    <?php if (get_theme_mod('cocobasic_show_title') !== 'no'): ?>                
                        <h1 class="site-title"><?php echo esc_html(get_bloginfo('name')); ?></h1>                 
                    <?php endif; ?>

                    <?php if (get_theme_mod('cocobasic_show_desc') !== 'no'): ?>                
                        <div class="site-description"><?php echo esc_html(get_bloginfo('description')); ?></div>                 
                    <?php endif; ?>

                    <?php
                    if (get_theme_mod('cocobasic_select_sidebar_content') != '') :
                        echo '<div class="my-info-wrapper">';
                        cocobasic_show_elementor_library_content(get_theme_mod('cocobasic_select_sidebar_content'));
                        echo '</div>';
                    endif;
                    ?>

                    <div class="menu-holder">               
                        <div class="menu-wrapper relative">
                            <?php
                            if (has_nav_menu("custom_menu")) {
                                wp_nav_menu(
                                        array(
                                            "container" => "nav",
                                            "container_class" => "big-menu",
                                            "container_id" => "header-main-menu",
                                            "fallback_cb" => false,
                                            "menu_class" => "main-menu sm sm-clean",
                                            "theme_location" => "custom_menu",
                                            "items_wrap" => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            "walker" => new cocobasic_header_menu()
                                        )
                                );
                            } else {
                                echo '<nav id="header-main-menu" class="big-menu default-menu"><ul>';
                                wp_list_pages(array("depth" => "3", 'title_li' => ''));
                                echo '</ul>';
                                echo '</nav>';
                            }
                            ?>       

                        </div>
                    </div>      

                    <?php if ((get_theme_mod('cocobasic_show_big_number') === 'yes') || (get_theme_mod('cocobasic_show_scroll') === 'yes')): ?>                
                        <div class="big-num"> 
                            <?php if (get_theme_mod('cocobasic_show_big_number') === 'yes'): ?>
                                <div class="current-big-num">01</div>
                            <?php endif; ?>
                            <?php if (get_theme_mod('cocobasic_show_scroll') === 'yes'): ?>
                                <div class="icon-scroll"></div> 
                                <?php
                            endif;
                            ?>
                        </div>
                    <?php endif; ?>
                </header>
            </div>                    
        </div>                    