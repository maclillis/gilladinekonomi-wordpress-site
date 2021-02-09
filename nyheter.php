<?php /* Template Name: Nyheter */ ?>

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

            <div class="gde-news-page-wrapper row">

            <div class="gde-news-page-col col-lg-8"> 
            <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $query = new WP_Query( array(
                    'posts_per_page' => 5,
                    'paged' => $paged,
                    'post_type' => 'nyheter'
                ) );
     
            ?>

            <?php if ( $query->have_posts() ) : ?>

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <div class="gde-news-page-module">

                <div class="gde-news-page-thumbnail">
                    <?php echo get_the_post_thumbnail( $page->ID, 'large', array( 'class' => 'gde-news-page-thumbnail-img' ) ); ?>
                </div>

                <div class="gde-news-page-date">
                    <?php echo 'Den ' . get_the_date('j F Y') . ' kl. ' . get_the_date('H:i') ;?>
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

            <?php endwhile; ?>


            <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
            </div>
            <div class="gde-news-page-sidebar-wrapper gde-news-page-col col-lg-3">
                <div class="gde-news-sidebar">
                    <?php if ( is_active_sidebar( 'news_sidebar' ) ) : ?>
                        <?php dynamic_sidebar( 'news_sidebar' ); ?>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
            </div>
            </div>
            <div class="gde-news-page-pagination-wrapper">
                <?php 
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $query->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => true,
                        'prev_text'    => sprintf( '<i class="fas fa-angle-left"></i> %1$s', __( 'Föregående', 'text-domain' ) ),
                        'next_text'    => sprintf( '%1$s <i class="fas fa-angle-right"></i>', __( 'Nästa', 'text-domain' ) ),
                        'add_args'     => false,
                        'add_fragment' => '',
                    ) );
                ?>
            </div>
            </div>

    </div>
</div>

<?php get_footer(); ?>