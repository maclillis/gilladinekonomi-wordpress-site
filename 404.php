<?php get_header(); ?>
<div class="gde-page-outer-wrapper">
    <div class="gde-targeted-pages-navigation-wrapper">
    <?php wp_nav_menu( array( "theme_location" => "target-meny-sidor", "container_class" => "gde-target-pages-navigation-list" ) ); ?>
    </div>
    <div class="gde-breadcrumbs-wrapper">
        <p><a href="<?php echo home_url(); ?>">
        Hem</a> / Sidan kunde inte hittas 
        </p>
    </div>

    <div class="gde-page-wrapper">
            <div class="gde-page-content">
                <h1><?php the_title(); ?></h3>

                <h2>Hoppsan! Den sidan kunde inte hittas</h2>

                <p>Det verkar som att det inte finns någonting här. Du kan testa en av länkarna i menynerna eller att göra en sökning.</p>

            </div>
    </div>
</div>

<?php get_footer(); ?>