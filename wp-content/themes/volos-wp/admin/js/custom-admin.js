(function ($) {

    "use stict";

    // COLORS                         
    wp.customize('cocobasic_preloader_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css1">';

            inlineStyle += '.doc-loader { background-color: ' + to + ' !important; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css1');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_body_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css2">';
            
            inlineStyle += 'body.ccb-css { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css2');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_menu_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css3">';

            inlineStyle += '.ccb-css .sm-clean a, .ccb-css .sm-clean a:hover, .ccb-css .sm-clean a:focus, .ccb-css .sm-clean a:active { color: ' + to + '; }';                                    

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css3');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });

    wp.customize('cocobasic_global_color1', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css4">';
            
            inlineStyle += 'body.ccb-css, .ccb-css .widget a, .ccb-css .search-field { color: ' + to + '; }';            
            inlineStyle += '.ccb-css .search-field::-webkit-input-placeholder { color: ' + to + '; }';            
            inlineStyle += '.ccb-css .search-field:-ms-input-placeholder { color: ' + to + '; }';            
            inlineStyle += '.ccb-css .search-field::placeholder { color: ' + to + '; }';            
            inlineStyle += '.ccb-css.single .nav-links:before { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css4');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
    wp.customize('cocobasic_global_color2', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css5">';
            
            inlineStyle += 'body.ccb-css a, .ccb-css .global-color, .ccb-css .timeline-event-date, .ccb-css .category-filter-list .button.is-checked, .ccb-css blockquote.wp-block-quote, .ccb-css h1, .ccb-css h2, .ccb-css h3, .ccb-css h4, .ccb-css h5, .ccb-css h6, .ccb-css .comments-holder .comment-author-date-replay-holder, .ccb-css .more-posts, .ccb-css .no-more-posts, .ccb-css .more-posts-loading { color: ' + to + '; }';            
            inlineStyle += '.ccb-css .global-background-color, .ccb-css .menu-holder, .ccb-css .img-caption, .ccb-css li.timeline-event:before, .ccb-css li.timeline-event span.timeline-circle:after, .ccb-css .skill-fill, .ccb-css .category-filter-icon, .ccb-css .category-filter-icon:after, .ccb-css .category-filter-icon:before, .ccb-css .portfolio-text-holder, .ccb-css .owl-theme .owl-dots .owl-dot.active span, .ccb-css .close-icon, .ccb-css .comments-holder ul.children:before { background-color: ' + to + '; }';            
            inlineStyle += '.ccb-css span.timeline-circle:before { border-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css5');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
    wp.customize('cocobasic_global_color3', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css6">';
            
            inlineStyle += '.ccb-css .current-num, .ccb-css .icon-scroll, .ccb-css .sm-clean a span.sub-arrow { color: ' + to + '; }';            
            inlineStyle += '.ccb-css .icon-scroll:before, .ccb-css .sm-clean a:after { background-color: ' + to + '; }';            
            inlineStyle += '.ccb-css .current-big-num { -webkit-text-stroke-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css6');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
    wp.customize('cocobasic_global_color4', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css7">';
            
            inlineStyle += '.ccb-css .total-pages-num, .ccb-css .comment-date, .ccb-css .archive-title h1, .ccb-css li.timeline-event:hover, .ccb-css .category-filter-list, .ccb-css .portfolio-text, .ccb-css .portfolio-cat { color: ' + to + '; }';            
            inlineStyle += '.ccb-css #toggle:before, .ccb-css #toggle:after, .ccb-css #toggle .menu-line, .ccb-css .pagination-div:after, .ccb-css .portfolio-cat:before, .ccb-css .owl-theme .owl-dots .owl-dot span, .ccb-css .owl-theme .owl-dots .owl-dot:hover span { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css7');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
    wp.customize('cocobasic_sidebar_background_color', function (value) {
        value.bind(function (to) {
            var inlineStyle, customColorCssElemnt;
            inlineStyle = '<style class="custom-color-css8">';
            
            inlineStyle += '.ccb-css .header-holder, .ccb-css .icon-scroll:after { background-color: ' + to + '; }';            

            inlineStyle += '</style>';

            customColorCssElemnt = $('.custom-color-css8');

            if (customColorCssElemnt.length) {
                customColorCssElemnt.replaceWith(inlineStyle);
            } else {
                $('head').append(inlineStyle);
            }

        });
    });
    
})(jQuery);