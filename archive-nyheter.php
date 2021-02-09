<?php get_header(); ?>
<div class="gde-page-outer-wrapper">
    <div class="gde-targeted-pages-navigation-wrapper">
    <?php wp_nav_menu( array( "theme_location" => "target-meny-sidor", "container_class" => "gde-target-pages-navigation-list" ) ); ?>
    </div>
    <div class="gde-breadcrumbs-wrapper">
        <p><a href="<?php echo home_url(); ?>">Hem</a> / Nyhetsarkiv / <?php echo get_the_date('Y'); ?> / <?php echo get_the_date('m');?> </p>
    </div>

    <div class="gde-page-wrapper">
            <div class="gde-page-content">
            <h1>Listar alla inlägg publicerade i <?php echo get_the_date('F Y');?></h1>
            <!--<?php /*query_posts(array( 'post_type' => 'nyheter', 'cat' => get_query_var('cat') )); */?>-->

            <div class="gde-news-page-wrapper row">

            <div class="gde-news-page-col col-lg-8">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="gde-news-page-module">

            <div class="gde-news-page-thumbnail">
                <?php echo get_the_post_thumbnail($recent['ID'],'large') ?>
            </div>

            <div class="gde-news-page-date">
                <?php echo 'Den ' . get_the_date('j F Y') . ' kl. ' . get_the_date('H:i'); ?>
            </div>

            <h2><a href="<?php the_permalink(); ?>" title="Läs"><?php the_title(); ?></a></h2>

            <div class="gde-news-page-content">
                <?php the_content(); ?>
            </div>

            <div class="gde-news-page-tags">
                <?php the_tags('Taggat i: ', ', '); ?>
            </div>

            </div>

            <div class="gde-news-page-divder">
            <hr class="gde-divider" />
            </div>


            <?php endwhile; else: ?>
            <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>
            <div class="gde-news-page-sidebar-wrapper gde-news-page-col col-lg-3">
            </div>
            </div>
            </div>
            <a href="../../../nyheter">
                <div class="gde-back-to-page-first"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/long-arrow-left-light.svg" class="back-icon" /><p>Tillbaka till nyhetssidan</p></div>
            </a>
            </div>
    </div>
</div>

<?php get_footer(); ?>