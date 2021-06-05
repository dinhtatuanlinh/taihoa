<?php
// tao hằng số lưu đường dẫn
define('DTTL_THEME_DIR', get_template_directory());// đường dẫn tới thư mục theme dẫn tới các khu vực chứa file
define('DTTL_THEME_URL', get_template_directory_uri());//
define('DTTL_THEME_INC_DIR', DTTL_THEME_DIR . '/inc');
define('DTTL_THEME_ASSETS_DIR', DTTL_THEME_DIR . '/assets');
define('DTTL_THEME_CUSTOMIZER_DIR', DTTL_THEME_INC_DIR . '/customizer');
define('DTTL_THEME_URL_IMG', get_template_directory_uri() . '/imgs');
define('DTTL_THEME_URL_ICON', get_template_directory_uri() . '/icons');
// 14.phân trang pagination
// add_action('linh_pagination_code', "linh_pagination_code", 10);
function linh_pagination_code($query) {
    // biến $query là đối tượng WP_Query được sử dụng để gọi các bài viết ra trang
    // echo '<pre style="color: #fff">';
    // print_r($query->max_num_pages);
    // echo '</pre>';
    $big = 99999999;
    $pagenum_link = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );//đưa định dạng trang vào đường dẫn
    // $pagenum_link = str_replace('&','#038;', $pagenum_link);
    // echo get_query_var('paged');// lấy số trang hiện tại
    $pagiArgs = array(
        'base' => $pagenum_link,
        // 'base' => '%#%',
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged')),// đoạn code này có ý nghĩa nếu tham số sau lớn hơn tham số trước thì lấy tham số sau làm giá trị
        'total' => $query->max_num_pages,// lấy tổng số trang của category bằng $query->max_num_pages
        'show_all' => false,
        'end_size' => 1,
        'mid_size' => 1,
        'prev_next' => true,// true để hiển thị về trang trước và tiến lên trang tiếp
        'prev_text' => '&larr;',
        'next_text' => '&rarr;',
        'type' => 'array',
        // 'add_args' => array('test' => 'abc', 'type' => 'happy'),
        // 'add_fragment' => '&test=abc',
        // 'before_page_number' => '[',
        // 'after_page_number' => ']'

    );
    // base: cơ sở của đườgn dẫn phân trang
    // format: định dạng của cấu trúc phân trang
    // current: số trang hiện tại. Mặc định là 1
    // total: số trang tối đa
    // show_all: hiển thị tất cả các trang hay rút gọn nó. Mặc định là false (rút gọn)
    // end_size: số trang sẽ hiển thị đầu và cuối danh sách. Mặc định là 1
    // mid_size: số trang sẽ hiễn thị 2 bên trang hiện tại. Mặc định là 2.
    // prev_next: có hiển thị nút Trang trước và Trang Sau hay không. Mặc định là true.
    // prev_text: đoạn ký tự cho nút Trang trước. Mặc định là “<<Previous”
    // next_text: đoạn ký tự cho nút Trang sau. Mặc định là  “Next >>”
    // type: điịnh dạng ủa giá trị trả về. Các giá trị có thể là ‘plain’, ‘array’ và ‘list’. Mặc định là ‘plain’
    // add_array: mảng tham số truy vấn được thêm vào. Mặc định là false.
    // add_fragment: chuỗi ký tự được thêm vào mỗi link page.
    // before_page_number: chuỗi ký tự xuất hiện trước số trang
    // after_page_number: chuỗi ký tự xuất hiện sau số trang
    $pagiArray = paginate_links($pagiArgs);
    // echo '<pre style="color: #fff">';
    // print_r($pagiArray);
    // echo '</pre>';
    ?>
    <?php
        $pagiHTML = '
            <div class="pagination">
                <ul>
        ';
        if (!empty($pagiArray)){
            foreach ($pagiArray as $pagiItem){
                $pagiHTML .= '<li>' . $pagiItem . '</li>';
                // echo '<li>' . $pagiItem . '</li>';
            }
        }
        $pagiHTML .= '
                </ul>
            </div>
        ';
    ?>
    <?php
    return $pagiHTML;
    
}
// 13. show sale percentage
add_action( 'woocommerce_sale_flash', 'sale_badge_percentage', 25 );
 
function sale_badge_percentage() {
   global $product;
   if ( ! $product->is_on_sale() ) return;
   if ( $product->is_type( 'simple' ) ) {
      $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
   } elseif ( $product->is_type( 'variable' ) ) {
      $max_percentage = 0;
      foreach ( $product->get_children() as $child_id ) {
         $variation = wc_get_product( $child_id );
         $price = $variation->get_regular_price();
         $sale = $variation->get_sale_price();
         if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
         if ( $percentage > $max_percentage ) {
            $max_percentage = $percentage;
         }
      }
   }
   if ( $max_percentage > 0 ) echo "<span class='onsale'>-" . round($max_percentage) . "%</span>"; // If you would like to show -40% off then add text after % sign
}
// 12. add rating post 
//Create the rating interface.
add_action( 'comment_form_logged_in_after', 'ci_comment_rating_rating_field' );
add_action( 'comment_form_after_fields', 'ci_comment_rating_rating_field' );
function ci_comment_rating_rating_field () {
    ?>

    <label for="rating">Rating<span class="required">*</span></label>
    <fieldset class="comments-rating">
        <span class="rating-container">

        <?php for ( $i = 5; $i >= 1; $i-- ) : ?>

            <input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" /><label for="rating-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></label>
        <?php endfor; ?>
            <input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0">0</label>
        </span>
    </fieldset>
<?php
}
// 11. update cart icon
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );
// -----------------
// 10. add some action hooks
// -----------------
/**
 * Add Cart icon and count to header if WC is active
 */
function my_wc_cart_count() {
 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
        $count = WC()->cart->cart_contents_count;
        ?>
        <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
            

            <?php
            if ( $count > 0 ) {
                ?>
                <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
                <?php
            }
                    ?>
        </a>
        <?php
    }
 
}
add_action( 'linh_cart_icon', 'my_wc_cart_count' );// header-menu.php

add_action('linh_rate', 'woocommerce_template_loop_rating', 5);// index.php
add_action('linh_addtocart', 'woocommerce_template_loop_add_to_cart', 5);// index.php
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price', 20 );// woocomerce/content-product.php
// ------------------
// 10. admin bar
// -----------------------------
// function admin_bar(){

//     if(is_user_logged_in()){
//       add_filter( 'show_admin_bar', '__return_true' , 1000 );
//     }
//   }
//   add_action('init', 'admin_bar' );
// ---------------------------------
// 9. remove một số thành phần ko cần thiết trong trang single product
// ----------------------------------
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); // remove rating //woocommerce/content-product.php
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // remove add to cart //woocommerce/content-product.php
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20);// woocommerce/archive-product.php
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); // woocommerce/content-product.php
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );// woocommerce/archive-product.php
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); // woocommerce/archive-product.php
// ----------------------------------
// 8. định nghĩa add woocommerce support to the theme
// ----------------------------
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}   


// ----------------------------
// 7. quản lý các hàm hỗ trợ
// lấy url từ ảnh trong bài viết
// resize lại kích thước của ảnh để tối ưu tốc độ load website
// ----------------------------
require_once DTTL_THEME_INC_DIR . '/support-functions.php';


// ----------------------------
// 6. quản lý customizer
// ----------------------------
// require_once DTTL_THEME_INC_DIR . '/customizer-manager.php';
// global $CustomizeVal;// khai báo biến $DDNCustomize để có thể sử dụng ở mọi nơi trong website
// $CustomizeVal = new dttl_Theme_Customizer_Manager();


// ----------------------------
// 5. 
// gọi class html trong tệp tin html.php vào
// trước tiên kiểm tra xem tệp tin ZendvnHtml đã tồn tại trong plugin nào chưa nếu rồi thì ko sử dụng lại nữa
// ----------------------------
if(!class_exists('ZendvnHtml') && is_admin()){
    require_once DTTL_THEME_INC_DIR . '/html.php';

}

// ----------------------------
// 4. quản lý menu
// ----------------------------
require_once DTTL_THEME_INC_DIR . '/menu-manager.php';

// ----------------------------
// 3. khai báo các dạng format và features
// ----------------------------
add_action('after_setup_theme', 'STREETWEAR_THEME_post_format');
function STREETWEAR_THEME_post_format(){
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio') );
    add_theme_support( 'post-thumbnails');
}

// ----------------------------
// 2. nap tep tin js
// ----------------------------
require_once DTTL_THEME_ASSETS_DIR . '/js/js-manager.php';
// ----------------------------
// 1. nap tep tin css
// ----------------------------
require_once DTTL_THEME_ASSETS_DIR . '/css/css-manager.php';
// ----------------------------
// 0. đổi giao diện edit về giao diện cũ
// ----------------------------
add_filter('use_block_editor_for_post', '__return_false');



// $newImgUrl = aaget_new_img_url('http://localhost/OneDrive%20-%20hus.edu.vn/lythuyet/wordpress/ddn/wp-content/uploads/2020/10/ricoh-Ri-1000.jpg', 50, 50);
//     echo "<pre style='color: red;font-size: 14px'>";
//     	print_r($newImgUrl);
//     echo "</pre>";

