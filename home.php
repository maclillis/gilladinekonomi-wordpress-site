<?php /* Template Name: Hem */ ?>

<?php get_header(); ?>

<div id="gde-news-module-outer-wrapper">

    <div class="gde-news-module-wrapper">
    
    <h1><?php the_field('nyhetsrubrik');?></h1>
    <h3><?php the_field('nyhet-subheading');?></h3>

    <div class="god-news-module-row row">
        <div class="gde-news-module-starring col-lg">
        <?php
                $args = array(
                    'posts_per_page' => '1',
                    'post_status' => ' publish, private',
                    'post_type' => 'nyheter' );
                $the_query = new WP_Query( $args );

                if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php if( get_field('featured-news') ) : ?>
                    <div class="gde-news-box">
                        <div id="gde-news-box-thumbnail">
                            <?php  if (has_post_thumbnail($recent['ID']) ): ?>
                            <div id="gde-news-box-thumbnail-date-wrapper">
                                <div id="gde-news-box-thumbnail-date">
                                    <p>I blickfånget</p>
                                </div>
                            </div>
                            <?php endif  ?>
                                <?php echo get_the_post_thumbnail($recent['ID'],'featured-large', 'alt=Nyhetsbild') ?>
                            </div>
                        <p class="gde-news-box-date">
                            <?php echo get_the_date('j F Y') ?>
                        </p>
                        <h2>
                            <a href="<?php echo get_permalink($recent['ID']) ?>" title="<?php echo esc_attr(the_title())?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <div class="gde-news-box-excerpt">
                            <?php echo force_balance_tags(html_entity_decode(wp_trim_words(htmlentities(get_the_content()), 80, '...')))?>
                        </div>
                        <a class="gde-news-box-button-link" href="<?php echo get_permalink($recent['ID']) ?>">
                            <button class="button button-solid">Läs hela artikeln</button>
                        </a>
                    </div>
                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
        </div>

        <div class="gde-news-module-aside col-lg">
            <?php
                $args = array( 'posts_per_page' => '4',
                               'post_status'  => ' publish, private',
                               'post_type' => 'nyheter' );
                $the_query = new WP_Query( $args );

                if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="gde-news-box">
                        <p class="gde-news-box-date">
                            <?php echo get_the_date('j F Y'); ?>
                        </p>
                        <h2>
                            <a href="<?php echo get_permalink($recent['ID']) ?>" title="<?php echo esc_attr($recent["post_title"])?>">
                                <?php the_title()?>
                            </a>
                        <?php if( get_field('featured-news') ) : ?>
                            <span class="gde-featured-badge">I blickfånget</span>
                        <?php endif; ?>
                        </h2>
                        <div class="gde-news-box-excerpt">
                            <?php echo wpautop(wp_trim_words(get_the_content(), 20))?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>

            <div class="gde-modules-readmore">
                <a href="nyheter/">
                    <p class="gde-readmore-text">Läs flera nyheter</p>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/icons/angle-right.svg" class="readmore-icon" alt="Högerpil" />
                </a>
            </div>
        </div>    
    </div>

    </div>

</div>

<div id="gde-sections-modules-outer-wrapper">
    <div class="row gde-sections-modules-wrapper">

        <div class="gde-links-module-wrapper col-lg">

        <h1><?php the_field('lankar-rubrik');?></h1>
        <h3><?php the_field('lankar-underrubrik');?></h3>

        <!-- Get the link-list for all the links and strip the http-protocol -->

        <?php $loop = new WP_Query( array( 
                            'post_type' => 'links', 
                            'posts_per_page' => 5,
                            'meta_query' => array(
                                array(
                                  'key' => 'startpage_link',
                                  'value' => '1',
                                  'compare' => '==' 
                                )
                              )
                             ) ); 
        ?>

        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="gde-links-module-box-wrapper">
                <div class="gde-links-module-box">
                    <div class="gde-links-module-info">
                            <div class="gde-links-module-url">
                                <a href="<?php the_field('link_url');?>" target="_blank">
                                    <h4><?php echo the_title();  ?></h4>
                                </a>
                            </div>
                            <div class="gde-links-module-description"><p><?php the_field('link_desc');?></p></div>
                    </div>
                    <div class="gde-links-module-icon">
                    <a href="<?php the_field('link_url');?>" target="_blank">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/icons/external-icon.svg" class="external-icon" alt="Högerpil" />
                    </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

        <div class="gde-modules-readmore">
            <a href="lankar/">
                    <p class="gde-readmore-text">Se alla våra länkar</p>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/icons/angle-right.svg" class="readmore-icon" alt="Högerpil" />
            </a>
        </div>

        </div>

        <div class="gde-events-module-wrapper col-lg">

            <h1><?php the_field('handelserubrik');?></h1>
            <h3><?php the_field('handelser-subheading');?></h3>

            <!-- Get the events-list for all the events -->

            <?php $loop2 = new WP_Query( array( 
                                            'post_type' => 'el_events', 
                                            'posts_per_page' => 5,
                                            'meta_key' => 'startdate', 
                                            'meta_query' => array(
                                                'relation' => 'OR',
                                                    array(
                                                        'key'  => 'startdate',
                                                        'value' => date('Y-m-d'),
                                                        'compare' => '>'
                                                    ),
                                                    array(
                                                        'key'  => 'enddate',
                                                        'value' => date('Y-m-d'),
                                                        'compare' => '>'
                                                    )
                                            ),
                                            'orderby' => 'meta_value',
                                            'order' => 'ASC',
                                            )); ?>

            <?php while ( $loop2->have_posts() ) : $loop2->the_post(); ?>

            <?php 
                $startDate = get_field('startdate');
                $startDateE = date_i18n("d M Y", strtotime($startDate));
                $startDateF = date_i18n("d M ", strtotime($startDate));
                $endDate = get_field('enddate');
                $endDateF = date_i18n("d M Y", strtotime($endDate));
            ?>

            <div class="gde-events-module-box-wrapper">
                <div class="gde-events-module-box row">
                    <div class="gde-events-module-date col-lg-4">       
                        <p><?php if ( $startDate === $endDate) {
                                    echo $startDateE;
                                } else if ($startDateF !== $endDateF && !strncmp($startDateF, $endDateF)) {
                                    echo $startDateF .' - '. $endDateF;
                                } ?></p>
                    </div>
                    <div class="gde-events-module-content col-lg-7">
                            <a href="<?php the_field('location');?>">
                                <div class="gde-events-module-title">
                                    <h4><?php the_title(); ?></h4>
                                </div>
                            </a>
                            <div class="gde-events-module-info">
                                <?php the_content(); ?>
                            </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>

            <div class="gde-modules-readmore">
            <a href="handelser/">
                    <p class="gde-readmore-text">Se alla våra händelser</p>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/icons/angle-right.svg" class="readmore-icon" alt="Högerpil" />
            </a>
        </div>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>