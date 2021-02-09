<?php /* Template Name: Nyheter */ ?>
<?php get_header(); ?>

<div class="gde-page-outer-wrapper">
    <div class="gde-targeted-pages-navigation-wrapper">
    <?php wp_nav_menu( array( "theme_location" => "target-meny-sidor", "container_class" => "gde-target-pages-navigation-list" ) ); ?>
    </div>
    <div class="gde-breadcrumbs-wrapper">
        <p><a href="<?php echo home_url(); ?>">Hem</a> / <a href="/nyheter"> Nyheter</a> / <?php the_title(); ?></p>
    </div>

    <div class="gde-page-wrapper">
            <div class="gde-page-content">

            <div class="gde-news-page-wrapper row">

            <div class="gde-news-page-col col-lg-8">

            <div class="gde-news-page-module">

                <div class="gde-news-page-thumbnail">
                <?php echo get_the_post_thumbnail( $page->ID, 'large', array( 'class' => 'gde-news-page-thumbnail-img' ) ); ?>
                </div>

                <div class="gde-news-page-date">
                    <?php echo 'Den ' . get_the_date('j F Y') . ' kl. ' . get_the_date('H:i'); ?>
                </div>
                
                <h2><?php the_title(); ?></h2>

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

            </div>
            <div class="gde-news-page-sidebar-wrapper gde-news-page-col col-lg-3">
                <div class="gde-news-sidebar">
                    <?php if ( is_active_sidebar( 'single_sidebar' ) ) : ?>
                        <?php dynamic_sidebar( 'single_sidebar' ); ?>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
            </div>
            </div>
            <div class="gde-news-page-pagination-wrapper">
                <?php previous_post_link('<i class="fas fa-angle-left"></i> %link'); ?>    <?php next_post_link('%link <i class="fas fa-angle-right"></i>' ); ?>
            </div>
            </div>

    </div>
</div>

<?php get_footer(); ?>