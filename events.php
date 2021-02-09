<?php /* Template Name: Händelser */ ?>
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

            <h2 class="gde-page-events-upcoming">Kommande händelser</h2>

            <?php 
                $date_now = date('Ymd', strtotime("now")); 
                $date_future = date('Ymd', strtotime("+24 months"));

                $upcoming_args = array(
                    'post_type'		=> 'events',
                    'posts_per_page'	=> -1,
                    'meta_key' => 'end_date',
                    'meta_compare' => 'BETWEEN',
                    'meta_type' => 'numeric',
                    'meta_value' => array($date_now, $date_future),
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
                ); 

                $past_args = array(
                    'post_type'		=> 'events',
                    'posts_per_page'	=> -1,
                    'meta_key' => 'end_date',
                    'meta_compare' => 'NOT BETWEEN',
                    'meta_type' => 'numeric',
                    'meta_value' => array($date_now, $date_future),
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC'
                );

                // the upcoming events query
                $upcoming_query = new WP_Query( $upcoming_args );

                // the past events query
                $past_query = new WP_Query( $past_args );
            ?>

<?php if ( $upcoming_query->have_posts() ) : ?>					
  <?php while ( $upcoming_query->have_posts() ) : $upcoming_query->the_post(); ?>
  								    
            <?php 

            $startDate = get_field('start_date');
            $endDate = get_field('end_date');

            ?>

            <div class="gde-page-events-module-row-wrapper">
            <div class="gde-page-events-module-row row">
                <div class="gde-page-events-module-col col-lg-3">
                    <div class="gde-page-events-left-date">
                                <p><?php if ( $startDate === $endDate) {
                                            echo $startDate;
                                        } else if ($startDate !== $endDate && !strncmp($startDate, $endDate)) {
                                            echo $startDate .'-'. $endDate;
                                        } ?></p>
                    </div>
                </div>
                    <div class="gde-page-events-module-col col-lg-6">
                        <div class="gde-page-events-middle-title">
                            <a href="<?php the_field('page_url'); ?>">
                                    <div class="gde-page-events-module-title">
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                            </a>
                        </div>
                    </div>

                <div class="gde-page-events-module-col col-lg-2">
                    <div class="gde-page-events-right-info">
                                <p><span>Plats:</span> <?php the_field('location');?></p>
                                <p><span>Målgrupp:</span> <?php the_field('audience');?></p>
                    </div>
                </div>
            </div>
            </div>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

            <?php else:  ?>
            <p><?php _e( 'Just nu har vi inga uppkommande händelser, kom tillbaks senare!' ); ?></p>
            <?php endif; ?>

            <h2 class="gde-page-events-upcoming">Tidigare händelser</h2>

            <?php if ( $past_query->have_posts() ) : ?>					
            <?php while ( $past_query->have_posts() ) : $past_query->the_post(); ?>
  								    
            <?php 

            $startDate = get_field('start_date');
            $endDate = get_field('end_date');

            ?>

            <div class="gde-page-events-module-row-wrapper">
            <div class="gde-page-events-module-row row">
                <div class="gde-page-events-module-col col-lg-3">
                    <div class="gde-page-events-left-date">
                                <p><?php if ( $startDate === $endDate) {
                                            echo $startDate;
                                        } else if ($startDate !== $endDate && !strncmp($startDate, $endDate)) {
                                            echo $startDate .'-'. $endDate;
                                        } ?></p>
                    </div>
                </div>
                    <div class="gde-page-events-module-col col-lg-4">
                        <div class="gde-page-events-middle-title">
                            <a href="<?php the_field('page_url'); ?>">
                                    <div class="gde-page-events-module-title">
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                            </a>
                        </div>
                    </div>

                <div class="gde-page-events-module-col col-lg-3">
                    <div class="gde-page-events-right-info">
                                <p><span>Plats:</span> <?php the_field('location');?></p>
                                <p><span>Målgrupp:</span> <?php the_field('audience');?></p>
                    </div>
                </div>
            </div>
            </div>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

            <?php else:  ?>
            <p><?php _e( 'Det finns inga tidigare händelser!' ); ?></p>
            <?php endif; ?>
            
            </div>

    </div>
    <a href="<?php echo home_url(); ?>">
        <div class="gde-back-to-page"><img src="<?php bloginfo('template_directory'); ?>/assets/icons/long-arrow-left-light.svg" class="back-icon" /><p>Tillbaka till startsidan</p></div>
    </a>
</div>

<?php get_footer(); ?>