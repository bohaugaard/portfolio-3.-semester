(function (api) {
    var cssTemplate = wp.template('cocobasic-color-scheme'),
            colorSchemeKeys = [
                'cocobasic_preloader_background_color',
                'cocobasic_body_background_color',
                'cocobasic_global_color1',
                'cocobasic_global_color2',
                'cocobasic_global_color3',
                'cocobasic_global_color4',
                'cocobasic_sidebar_background_color',                
                'cocobasic_menu_color'
            ],
            colorSettings = [
                'cocobasic_preloader_background_color',
                'cocobasic_body_background_color',
                'cocobasic_global_color1',
                'cocobasic_global_color2',
                'cocobasic_global_color3',
                'cocobasic_global_color4',
                'cocobasic_sidebar_background_color',                
                'cocobasic_menu_color'
            ];

    api.controlConstructor.select = api.Control.extend({
        ready: function () {
            if ('color_scheme' === this.id) {
                
                this.setting.bind('change', function (value) {
                    // Update Background Color.
                    api('cocobasic_preloader_background_color').set(colorScheme[value].colors[0]);
                    api.control('cocobasic_preloader_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[0])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[0]);

                    // Update Background Color.
                    api('cocobasic_body_background_color').set(colorScheme[value].colors[1]);
                    api.control('cocobasic_body_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[1])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[1]);

                    // Update Background Color.
                    api('cocobasic_global_color1').set(colorScheme[value].colors[2]);
                    api.control('cocobasic_global_color1').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[2])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[2]);

                    // Update Background Color.
                    api('cocobasic_global_color2').set(colorScheme[value].colors[3]);
                    api.control('cocobasic_global_color2').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[3])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[3]);

                    // Update Background Color.
                    api('cocobasic_global_color3').set(colorScheme[value].colors[4]);
                    api.control('cocobasic_global_color3').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[4])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[4]);

                 // Update Background Color.
                    api('cocobasic_global_color4').set(colorScheme[value].colors[5]);
                    api.control('cocobasic_global_color4').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[5])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[5]);

                    // Update Background Color.
                    api('cocobasic_sidebar_background_color').set(colorScheme[value].colors[6]);
                    api.control('cocobasic_sidebar_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[6])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[6]);
   
                    // Update Background Color.
                    api('cocobasic_menu_color').set(colorScheme[value].colors[7]);
                    api.control('cocobasic_menu_color').container.find('.color-picker-hex')
                            .data('data-default-color', colorScheme[value].colors[7])
                            .wpColorPicker('defaultColor', colorScheme[value].colors[7]);
                });
            }
        }
    });

})(wp.customize);