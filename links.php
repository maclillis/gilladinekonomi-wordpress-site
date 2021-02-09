<?php /* Template Name: Länkar */ ?>
<?php get_header(); ?>
<div class="gde-page-outer-wrapper">
    <div class="gde-targeted-pages-navigation-wrapper">
    <?php wp_nav_menu( array( "theme_location" => "target-meny-sidor", "container_class" => "gde-target-pages-navigation-list" ) ); ?>
    </div>
    <div class="gde-breadcrumbs-wrapper">
        <p><a href="<?php echo home_url(); ?>">Hem</a> / <?php the_title(); ?></p>
    </div>

    <div class="gde-page-wrapper">
            <div class="gde-page-content">
            <h1><?php the_title(); ?></h3>

            <h2 class="gde-page-links-heading">Gratis oberoende vägledning</h2>

            <?php $loop = new WP_Query( 
                array( 'post_type' => 'links',
                        'tax_query' => array(
                        array (
                            'taxonomy' => 'links_category',
                            'field' => 'slug',
                            'terms' => 'oberoende-vagledning',
                        )
                    ),
            ) ); ?>

            <?php $loop2 = new WP_Query( 
                array( 'post_type' => 'links',
                        'tax_query' => array(
                        array (
                            'taxonomy' => 'links_category',
                            'field' => 'slug',
                            'terms' => 'gratis-forelasningar ',
                        )
                    ),
            ) ); ?>

            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="gde-page-links-module-row-wrapper">
            <div class="gde-page-links-module-row row">
                <div class="gde-page-links-module-col col-lg-2">
                    <div class="gde-page-links-left-url">                                
                        <a href="<?php the_field('link_url');?>" target="_blank">
                            <h4><?php echo the_title();?></h4>
                        </a>
                    </div>
                </div>
                <div class="gde-page-links-module-col col-lg-4">
                    <div class="gde-page-links-middle-info">
                        <p><?php the_field('link_desc');?></p>
                    </div>
                </div>
                <div class="gde-page-links-module-col col-lg-2">
                    <div class="gde-page-links-right-info">
                        <a href="<?php the_field('link_url');?>" target="_blank">
                            <button class="button button-solid"><p>Gå till sidan</p><img src="<?php bloginfo('template_directory'); ?>/assets/icons/external-icon-white.svg" class="external-icon-white" alt="Extern webb-ikon" /></button>
                        </a>
                    </div>
                </div>
            </div>
            </div>
            <?php endwhile; ?>

            <h2 class="gde-page-links-heading">Kostnadsfria föreläsningar nära dig</h2>

            <?php while ( $loop2->have_posts() ) : $loop2->the_post(); ?>

            <div class="gde-page-links-module-row-wrapper">
            <div class="gde-page-links-module-row row">
                <div class="gde-page-links-module-col col-lg-2">
                    <div class="gde-page-links-left-url">                                
                        <a href="<?php the_field('link_url');?>" target="_blank">
                            <h4><?php echo the_title();?></h4>
                        </a>
                    </div>
                </div>
                <div class="gde-page-links-module-col col-lg-4">
                    <div class="gde-page-links-middle-info">
                        <p><?php the_field('link_desc');?></p>
                    </div>
                </div>
                <div class="gde-page-links-module-col col-lg-2">
                    <div class="gde-page-links-right-info">
                        <a href="<?php the_field('link_url');?>" target="_blank">
                            <button class="button button-solid"><p>Gå till sidan</p><img src="<?php bloginfo('template_directory'); ?>/assets/icons/external-icon-white.svg" class="external-icon-white" alt="Extern webb-ikon" /></button>
                        </a>
                    </div>
                </div>
            </div>
            </div>
            <?php endwhile; ?>
            </div>
    </div>
    <a href="<?php echo home_url(); ?>">
        <div class="gde-back-to-page"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/long-arrow-left-light.svg" class="back-icon" alt="Tillbaka-pil" /><p>Tillbaka till startsidan</p></div>
    </a>
</div>

<?php get_footer(); ?>