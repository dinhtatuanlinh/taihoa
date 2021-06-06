<?php
get_header();
get_header('menu');


?>
<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );

        
                 ?>
<main class="search-page">
    <div class="container">
        <div class="wrapper">
            <div class="row">
                <section class="col-lg-12 ">
                    <div class="result">
                        <?php if ( $the_query->have_posts() ) {
        _e("<h1 class='title'>Search Results for: ".get_query_var('s')."</h1>"); ?>
                        <div class="details">
                            <?php
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                    ?>
                            <div class="details__card">
                                <a href="<?php the_permalink(); ?>" alt="">
                                    <div class="details__card--img">
                                        <?php woocommerce_template_loop_product_thumbnail(); ?>
                                        <i class="demo-icon icon-search"></i>

                                    </div>
                                </a>

                                <div class="details__card--infor">
                                    <h3>
                                        <a href="<?php the_permalink(); ?>" alt="">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <span class="label">
                                        Xem chi tiết
                                    </span>
                                </div>
                            </div>
                            <?php }; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
<?php

    }else{
?>
<h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
<div class="alert alert-info">
    <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
</div>
<?php } ?>

<?php
get_footer();
?>