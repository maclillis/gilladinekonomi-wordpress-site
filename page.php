<?php get_header(); 

$current = $post->ID;
$parent = $post->post_parent;
$grandparent_get = get_post($parent);
$grandparent = $grandparent_get->post_parent;
?>
<div class="gde-page-outer-wrapper">
    <div class="gde-targeted-pages-navigation-wrapper">
    <?php wp_nav_menu( array( "theme_location" => "target-meny-sidor", "container_class" => "gde-target-pages-navigation-list" ) ); ?>
    </div>
    <div class="gde-breadcrumbs-wrapper">
        <p><a href="<?php echo home_url(); ?>">
        Hem</a> /
        <?php if ($root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current)) { ?>
                <a href="<?php echo home_url(); ?><?php echo wp_make_link_relative(get_the_permalink($grandparent))?>"> <?php echo get_the_title($grandparent)?> </a> / <a href="<?php echo home_url(); ?>/<?php echo strtolower(get_the_title($grandparent)).'/'.strtolower(get_the_title($parent))?>/"> <?php echo get_the_title($parent)?> </a> / <?php echo get_the_title($current);}
                else if ($root_parent = get_the_title($parent) !== $root_parent = get_the_title($current)) { ?>
                <a href="<?php echo home_url(); ?><?php echo wp_make_link_relative(get_the_permalink($parent))?>"><?php echo get_the_title($parent) ?></a> / <?php echo get_the_title($current); ?>
                <?php ;} else { ?>
                <?php echo get_the_title($current); ?>
                <?php }?>
        </p>
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

                <?php
                $args = array(
                    'posts_per_page' => '1',
                    'post_status' => ' publish, private',
                    'post_type' => 'medarbetare',
                    'order' => 'ASC' );
                $the_query = new WP_Query( $args );

                $conField = get_field('contact-person');

                if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <?php if( !empty($conField)) : ?>
                <div class="gde-contact-card-wrapper">
                    <h2 class="gde-contact-heading"> Kontaktperson </h2>
                    <div id="gde-contact-person-wrapper">
                        <div class="gde-contact-person-col">
                            <div class="gde-employees-img"><img src="<?php the_field('emp-profile-img', $conField ->ID)?>" class="gde-contact-img" alt="Medarbetarbild" /></div>
                        </div>
                        <div class="gde-contact-person-col">
                            <div class="gde-employees-name"><?php the_field('emp-name', $conField ->ID)?></div>
                            <div class="gde-employees-title"><?php the_field('emp-title', $conField ->ID)?></div>
                            <div class="gde-employees-mail"><span>E-post:</span> <a href="mailto:<?php the_field('emp-email')?>"><?php the_field('emp-email', $conField ->ID)?></a></div>
                            <div class="gde-employees-phone"><span>Tel:</span> <?php the_field('emp-phone', $conField ->ID)?></div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
    </div>
</div>

<?php get_footer(); ?>