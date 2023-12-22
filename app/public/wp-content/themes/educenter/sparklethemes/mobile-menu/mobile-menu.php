<div class="menu-modal header-mobile-menu cover-modal header-footer-group" data-modal-target-string=".menu-modal">
    <div class="menu-modal-inner modal-inner">
        <div class="menu-wrapper section-inner">
            <div class="menu-top">

                <button class="toggle close-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
                    <span class="toggle-text"><?php esc_html_e( 'Close', 'educenter' ); ?></span>
                    <i class="fas fa-times"></i>
                </button><!-- .nav-toggle -->

                <div class="menu-search-form widget_search">
                    <?php get_search_form(); ?>
                </div>

                <div class='sparkle-tab-wrap'>
                    <div class="sparkle-tabs we-tab-area">
                        <button class="sparkle-tab-menu active" id="sparkle-tab-menu1">
                            <span><?php echo esc_html( 'Menu','educenter' ) ?></span>
                        </button>
                    </div>

                    <div class="sparkle-tab-content we-tab-content">
                        <div class="sparkle-tab-menu-content tab-content" id="sparkle-content-menu1">
                            <nav class="mobile-menu" aria-label="<?php echo esc_attr_e( 'Mobile', 'educenter' ); ?>" role="navigation">
                                <ul class="modal-menu">
                                    <?php
                                        if ( has_nav_menu( 'menu-1' ) ) {
                                            wp_nav_menu(
                                                array(
                                                    'container'      => '',
                                                    'items_wrap'     => '%3$s',
                                                    'show_toggles'   => true,
                                                    'theme_location' => 'menu-1',
                                                )
                                            );
                                        }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>