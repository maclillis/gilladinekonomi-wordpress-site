<!DOCTYPE html>
<html lang="sv" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); echo ' | '; if ( is_front_page() ) : bloginfo( 'description' ); else : wp_title(''); endif; ?></title>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/libs/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/sass.css" />

    <!-- Flexbox Grid CSS Library -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/flexboxgrid.min.css" />

    <!-- Font Awesome CSS Library -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/all.min.css">

    <link rel="icon" type="image/png" href="<?php bloginfo("template_directory"); ?>/assets/images/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?php bloginfo("template_directory"); ?>/assets/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?php bloginfo("template_directory"); ?>/assets/images/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php bloginfo("template_directory"); ?>/assets/images/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?php bloginfo("template_directory"); ?>/assets/images/favicon/favicon-128.png" sizes="128x128" />
    
    <?php wp_head();?>
  </head>
  <body>
      <div id="gde-mobile-menu-outer-wrapper">
          <div id="gde-mobile-menu-wrapper">
          <div id="gde-menu-background"></div>
              <div id="gde-mobile-menu">
                <div class="gde-menu-row">
                    <div class="gde-menu-title">
                        <h2>Meny</h2>
                    </div>
                    <div id="gde-menu-close">
                        <button class="button button-solid" alt="Menyknapp"><i class="fas fa-times"></i><p>Stäng</p></button>
                    </div>
                </div>
                <div class="gde-menu-list-row">
                    <?php wp_nav_menu( array( "theme_location" => "top-meny", "container_class" => "gde-mobile-menu-list" ) ); ?>
                    </div>
                    <div class="gde-menu-border"><h3>Målgrupper</h3></div>
                    <div class="gde-menu-short-list-row"> 
                    <?php wp_nav_menu( array( "theme_location" => "target-meny-sidor", "container_class" => "gde-target-mobile-navigation-list" ) ); ?></div>
                </div>
            </div>
          </div>
      </div>

      <div id="gde-back-top">
        <div id="gde-back-top-inner">
        <i class="fas fa-arrow-up"></i>
      </div>
        <p>Till toppen</p>
      </div>
    <div id="gde-outer-wrapper">
    <div class="gde-top-header-wrapper">
        <div class="gde-top-header">

            <div class="gde-top-logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/images/gde_turkos_logo.png" class="gde-logo-img" alt="Gilla Din Ekonomi logo" /></a>
            </div>

            <div class="gde-top-header-right">
                <div class="gde-top-header-right-navigation">
                    <?php wp_nav_menu( array( "theme_location" => "top-meny", "container_class" => "gde-top-menu-list", 'menu_id' => 'start-page-menu' ) ); ?>
                </div>
                <div class="gde-top-header-right-search">
                    <?php get_search_form()?>
                </div>

                <div id="gde-menu-btn">
                    <button class="button button-solid">
                        <i class="fas fa-bars"></i>
                        <p>Meny</p>
                    </button>
                </div>
            </div>

        </div>
    </div>
        <?php  if (is_page_template('home.php')): ?>
        <div id="gde-header-hero-wrapper">

        <div id="gde-header-hero-bumper-wrapper">
            <div id="gde-header-hero-bumper">
                <h2><?php the_field('bumper-heading');?></h2>
                <p><?php the_field('bumper-text');?></p>
            </div>
            <?php if (get_field('bumper-link')): ?>
            <a href="<?php the_field('bumper-link');?>">
                <button class="button button-solid">Läs mer</button>
            </a>
            <?php endif ?>
        </div>
        <div id="gde-header-hero-image" style="background-image:url(<?php the_field('hero-background'); ?>);"></div>
        
        </div>
        <?php endif ?>

        <?php  if (is_page_template('home.php')): ?>
        <div id="gde-targeted-start-navigation-outer-wrapper">
            <div class="gde-targeted-start-navigation-wrapper">
                <?php wp_nav_menu( array( "theme_location" => "target-meny-sidor", "container_class" => "gde-target-start-navigation-list" ) ); ?>
            </div>
        </div>
        <div class="gde-targeted-information-wrapper">

                <div class="gde-targeted-row">
                    <div class="gde-targeted-box">
                        <div class="gde-targeted-heading">
                           <h2>Nätverk</h2>
                        </div>

                        <div class="gde-targeted-info-outer-wrapper">
                            <div class="gde-targeted-icon-wrapper">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/icons/network-icon.svg" class="targeted-icon" alt="Nätverksikon" />
                            </div>

                            <p class="gde-target-text"><?php the_field('network-puff-text');?></p>
                        </div>

                        <div class="gde-targeted-readmore">
                            <a href="<?php the_field('natverkspuff-link');?>"><p class="gde-readmore-text">Läs mer</p></a>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/icons/angle-right.svg" class="readmore-icon" alt="Högerpil" />
                        </div>
                    </div>
                    <div class="gde-targeted-box">
                        <div class="gde-targeted-heading">
                            <h2>Utbildningar</h2>
                        </div>
                    <div class="gde-targeted-info-outer-wrapper">

                    <div class="gde-targeted-icon-wrapper">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/icons/education-icon.svg" class="targeted-icon" alt="Utbildningsikon" />
                        </div>

                        <p class="gde-target-text"><?php the_field('utbildningarpuff-text');?></p>
                    </div>

                        <div class="gde-targeted-readmore">
                            <a href="<?php the_field('utbildningar-link');?>"><p class="gde-readmore-text">Läs mer</p></a>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/icons/angle-right.svg" class="readmore-icon" alt="Högerpil" />
                        </div>
                    </div>
                    <div class="gde-targeted-box">
                        <div class="gde-targeted-heading">
                        <h2>Informatörer</h2>
                        </div>
                    <div class="gde-targeted-info-outer-wrapper">
                    <div class="gde-targeted-icon-wrapper">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/icons/information-icon.svg" class="targeted-icon" alt="Informationsiko " />
                        </div>

                        <p class="gde-target-text"><?php the_field('informatorer-text');?></p>
                    </div>
                        <div class="gde-targeted-readmore">
                            <a href="<?php the_field('informatorer-link');?>"><p class="gde-readmore-text">Läs mer</p></a>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/icons/angle-right.svg" class="readmore-icon" alt="Högerpil" />
                        </div>
                    </div>

                    <div class="gde-targeted-box">
                        <div class="gde-targeted-heading">
                            <h2>Privatekonomi</h2>
                        </div>

                        <div class="gde-targeted-info-outer-wrapper">
                            <div class="gde-targeted-icon-wrapper">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/icons/economy-icon.svg" class="targeted-icon" alt="Privatekonomi-ikon" />
                            </div>

                            <p class="gde-target-text"><?php the_field('privatekonomi-text');?></p>
                        </div>

                        <div class="gde-targeted-readmore">
                            <a href="<?php the_field('privatekonomi-link');?>"><p class="gde-readmore-text">Läs mer</p></a>
                            <img src="<?php bloginfo('template_directory'); ?>/assets/icons/angle-right.svg" class="readmore-icon" alt="Högerpil" />
                        </div>        
                    </div>
                </div>
        </div>
        <?php endif ?>
