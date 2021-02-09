<?php wp_footer(); ?>
    <footer class="gde-footer-wrapper">
        <div class="gde-inner-footer-wrapper">
            <div class="gde-footer-left row">
                <div class="gde-footer-menu col-xs-6">
                    <p>Snabbmeny</p>
                    <div class="gde-footer-menu-content-row row">
                        <div class="gde-footer-menu-content-col col-xs"><?php wp_nav_menu( array( "theme_location" => "sidfot-meny-left", "container_class" => "gde-footer-menu-list-left" ) ); ?></div>
                        <div class="gde-footer-menu-content-col col-xs"><?php wp_nav_menu( array( "theme_location" => "sidfot-meny-right", "container_class" => "gde-footer-menu-list-right" ) ); ?></div>
                    </div>
                </div>
                <div class="gde-footer-socials col-xs-5">
                    <p>Sociala medier</p>
                    <ul>
                        <li>
                            <a href="https://twitter.com/gilladinekonomi" target="_blank">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/icons/twitter.png" class="gde-social-icons" />
                                <p>Twitter</p>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/gilladinekonomi" target="_blank">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/icons/facebook.png" class="gde-social-icons" />
                                <p>Facebook</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="gde-footer-right">
                <div class="gde-footer-logo">
                <img src="<?php bloginfo('template_directory'); ?>/assets/images/fi-logo.png" class="gde-finans-logo" />
                </div>
                <div class="gde-footer-information">
                    <p>Finansinspektionen</p>
                    <a href="https://www.fi.se" target="_blank"><p>fi.se</p></a>
                    
                    <a href="om-cookies/"><p>Om cookies</p></a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
  </body>
</html>