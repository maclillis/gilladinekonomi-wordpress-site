<?php /* Template Name: Kontakt */ ?>
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
            <?php

                if (have_posts()):
                while (have_posts()) : the_post();
                the_content();
                endwhile;
                else:
                echo '<p>Sorry, no posts matched your criteria.</p>';
                endif;

            ?>

            <div id="gde-employees-boxes-wrapper">
            <?php
                $args = array(
                    'post_status' => ' publish, private',
                    'post_type' => 'medarbetare',
                    'order' => 'ASC' );
                $the_query = new WP_Query( $args );

                if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="gde-employees-box">
                    
                        <div class="gde-employees-left">
                            <div class="gde-employees-img"><img src="<?php the_field('emp-profile-img')?>" class="gde-emp-img" alt="Medarbetar-bild" /></div>
                        </div>

                        <div class="gde-employees-right">
                            <div class="gde-employees-name"><?php the_field('emp-name')?></div>
                            <div class="gde-employees-title"><?php the_field('emp-title')?></div>
                            <div class="gde-employees-mail"><span>E-post:</span> <a href="mailto:<?php the_field('emp-email')?>"><?php the_field('emp-email')?></a></div>
                            <div class="gde-employees-phone"><span>Tel:</span> <?php the_field('emp-phone')?></div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
            </div>

    </div>
</div>

<?php get_footer(); ?>