<?php 
get_header(); 
get_header('menu');

$upload_dir = wp_upload_dir();

// echo '<pre style="color: #fff">';
// print_r($upload_dir['url']);
// echo '</pre>';
?>
<main class="homepage">
    <?php get_header('banner'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 homepage__left">

                <div class="new-products">

                    <div class="title">
                        <h2>Sản phẩm mới</h2>
                    </div>
                    <div class="details">
                        <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 4,
                                'orderby'    => 'date',
                                'order'      => 'DESC',
                                'hide_empty' => false,
                            );
                            $query = new WP_Query( $args );

                            if ( $query->have_posts() ) :
                                while ($query->have_posts()) : $query->the_post();//phải dùng vòng lặp while để lấy ra đúng bài được chọn
                                $product = wc_get_product( get_the_ID() ); /* get the WC_Product Object */
                        ?>

                        <div class="details__card">
                            <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
                                <div class="details__card--img">
                                    <img src="<?php  echo get_the_post_thumbnail_url(); ?>"
                                        alt="<?php the_title(); ?>">
                                    <i class="demo-icon icon-search"></i>

                                </div>
                            </a>

                            <div class="details__card--infor">
                                <h3>
                                    <a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                    </a>
                                </h3>
                                <span class="label">
                                    Xem chi tiết
                                </span>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            endif;
                            wp_reset_postdata();// reset lại đối tương wp_query
                        ?>
                    </div>
                    <?php linh_pagination_code($query); ?>
                </div>
            </div>
            <div class="col-lg-3 homepage__right">
                <div class="author-card">
                    <div id="particles-js"></div> <!-- stats - count particles -->
                    <div class="welcome">
                        <span>歡</span>
                        <span>迎</span>
                    </div>


                </div>

            </div>
        </div>
    </div>

</main>
<?php
get_footer();
?>