<?php
get_header();
get_header('menu');


?>
</div>
<?php if(is_product_category()){ // check có phải trang danh mục sản phẩm không ?>
<div id="cat_banner">
    <?php 
        
            $term = get_queried_object(); // lấy slug của trang danh mục sản phẩm
            // echo $term->slug; // lấy slug của category
            // $terms = 'nhan-nu';
            $category = get_term_by('slug', $term->slug, 'product_cat');
    
            $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
        
        
    ?>

    <img src="<?php echo $image; ?>" alt="">
</div>
<?php }; ?>
<main class="product-detail <?php if(!is_singular('product')){ echo 'search-page';}; ?>">
    <div class="container">
            
            <?php
                if ( is_singular( 'product' ) ) {
                    
                    woocommerce_content();
                }else{
                //For ANY product archive.
                //Product taxonomy, product search or /shop landing
                    woocommerce_get_template( 'archive-product.php' );// woocommerce có lỗi khi gọi tệp tin archive-product.php nên phải thêm dòng này để fix
                }
            ?>

        
    </div>
    <div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">

    <div class="product-img">
        <img src="https://tinhlamjw.com/wp-content/uploads/2021/01/MM-web-009.jpg" alt="">
        <span class="close">&times;</span>
    </div>
</div>

</div>
</main>



<?php 

get_footer(); 
?>