<?php /* Template Name: Search */ ?>

<?php 
  get_header(); 
  global $wp_query;
  ?>
<div class="gde-page-outer-wrapper">
    <div class="gde-targeted-pages-navigation-wrapper">
    <?php wp_nav_menu( array( "theme_location" => "target-meny-sidor", "container_class" => "gde-target-pages-navigation-list" ) ); ?>
    </div>
    <div class="gde-breadcrumbs-wrapper">
        <p><a href="<?php echo home_url(); ?>">Hem</a> / Sökresultat</p>
    </div>

    <div class="gde-page-wrapper">
            <div class="gde-page-content">
            <h1>Sökresultat för "<?php the_search_query(); ?>" </h1>
            <h3 class="gde-search-sub-heading">Hittade <span class="gde-search-span"> <?php echo $wp_query->found_posts; ?></span>
            <?php _e( 'sidor ', 'locale' ) ?> som innehöll den sökningen.</h3> 

            <?php if ( have_posts() ) { ?>
            <div class="gde-search-result-content">
            <ul>

            <?php while ( have_posts() ) { the_post(); ?>

            <li>
                <h2><a href="<?php echo get_permalink(); ?>">
                <?php the_title();  ?>
                </a></h2>
                <?php  the_post_thumbnail('medium') ?>
                <p><?php echo substr(get_the_excerpt(), 0,200); ?></p>
                <div class="gde-search-spacer"> <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></div>
            </li>

            <?php } ?>

            </ul>
            </div>

            <?php } ?>
            </div>
    </div>
</div>

<?php get_footer(); ?>