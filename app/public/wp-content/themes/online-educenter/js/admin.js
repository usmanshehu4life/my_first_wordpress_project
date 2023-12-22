(function(api) {

    wp.customize('educenter_homepage_slider_type', function(setting) {
        var defaultSlider = function(control) {
			var visibility = function() {
                if ('default' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var advancetSlider = function(control) {
            var visibility = function() {
                if ('advance' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var bothSlider = function(control) {
            var visibility = function() {
                if ('advance' === setting.get() || 'default' === setting.get() ) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        var search = function(control) {
            var visibility = function() {
                if ('search' === setting.get()) {
                    control.container.removeClass('customizer-hidden');
                } else {
                    control.container.addClass('customizer-hidden');
                }
            };
            visibility();
            setting.bind(visibility);
        };

        wp.customize.control( 'educenter_banner_all_sliders', defaultSlider );
        wp.customize.control( 'educenter_banner_normal_all_sliders', advancetSlider );
        wp.customize.control( 'educenter_banner_nav_style', bothSlider );
        
        wp.customize.control( 'online_educenter_slider_title', search );
        wp.customize.control( 'online_educenter_slider_desc', search );
        wp.customize.control( 'online_educenter_slider_features', search );

    });
})(wp.customize);