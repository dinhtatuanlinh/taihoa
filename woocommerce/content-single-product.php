<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$image_ids = $product->get_gallery_image_ids();

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

$args = array(
    'post_id' => $product->get_id(),
    'status' => 'approve',
);
$comments = get_comments( $args );// trả về một mảng các comment nếu có biến count = true trong args truyền vào thì sẽ trả về số lượng các phần tử của mảng
 
// echo '<pre style="color: #fff">';
// print_r($comments);
// echo '</pre>';
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="row">
    <section class="col-lg-5 product-detail__left">
        <div class="product-img">
            <?php echo the_post_thumbnail( $page->ID, 'full' ); ?>
            <div id="open-modal" class="open-modal">
                <i class="demo-icon icon-search"></i>
            </div>
        </div>

    </section>
    <section class="col-lg-7 product-detail__right">
        <div class="product-name">
            <h1 class="title"><?php the_title(); ?></h1>
        </div>
        <div class="product-infor">
            <h3 class="title">
                Thông số sản phẩm:
            </h3>
            <div class="product-infor__table">
                <?php echo $product-> get_short_description(); ?>

            </div>
            <div class="contact">
                <span>Liên hê: 190000000</span>
            </div>
        </div>
    </section>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="title">
            Mô tả sản phẩm:
        </h3>
        <div class="product-infor__text">
            <div id="content">
                <?php
                    the_content();
                ?>
            </div>


        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="title">
            Sản phẩm liên quan:
        </h3>
        <?php
        // echo '<pre style="color: #000">';
        // print_r($product->get_category_ids()); // lấy id của các cat chưa sản phẩm này
        // echo '</pre>';

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 4,
                'orderby'    => 'rand',
                'order'      => 'DESC',
                'tax_query'             => array(
                    array(
                        'taxonomy'      => 'product_cat',
                        'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                        'terms'         => $product->get_category_ids(),// lấy id của các cat chưa sản phẩm này
                        'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                    ),
                ),
                'hide_empty' => false,
                'has_password' => false,
            );
            $query = new WP_Query( $args );
        ?>
        <div class="details">
            <?php
                if ( $query->have_posts() ) :
                    while ($query->have_posts()) : $query->the_post();//phải dùng vòng lặp while để lấy ra đúng bài được chọn
                    $product = wc_get_product( get_the_ID()); /* get the WC_Product Object */
            ?>
            <div class="details__card">
                <a href="<?php the_permalink(); ?>">
                    <div class="details__card--img">
                        <img src="<?php  echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
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
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>