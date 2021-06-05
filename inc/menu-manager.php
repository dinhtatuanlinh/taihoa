<?php
//khai bao vùng menu
add_action('init', 'dttl_theme_menu');
function dttl_theme_menu(){
    register_nav_menus(
        array(
            'main_menu' => __('main menu','jemmia'),
            'mobile_menu' => __('mobile menu','jemmia'),
            'menu_1' => __('menu 1','jemmia'),
            'menu_2' => __('menu 2','jemmia'),
            'menu_3' => __('menu 3','jemmia'),
            'menu_4' => __('menu 4','jemmia')
        )
    );
}

// filter menu dùng để thêm các icon tùy biến cho các phần tử trong menu
/*
add_filter('walker_nav_menu_start_el', 'dttl_filter_menu',10,4);// 10 là độ ưu tiên của filter hook, 4 là số tham số truyền vào hàm DDN_filter_menu
function dttl_filter_menu($item_output, $item, $depth, $args){
    // $item là thông tin của từng phần tử menu như các class của menu, vv
    // $depth độ sâu của các phần tử menu
    // $args là thông tin của vùng menu ví dụ vùng menu mobile-menu, vùng menu desktop-menu
    // $item_output là nội dung bên trong thẻ phần từ menu ví dụ là <a href="#" title="Trang chủ">Trang chủ</a>
    // để thêm item dropdown vào phần tử menu có menu con trước tiền phải xác định vùng menu
    // tiếp theo kiểm tra xem class của phần tử menu này có class là 'menu-item-has-children' hay không
    
    if($args->theme_location == 'mobile-menu'){
        $itemClass = $item->classes;
        if (in_array('menu-item-has-children', $itemClass) && $item->menu_item_parent == 0){
            $item_output = str_replace('</a>', '</a> <i class="fa fa-sort-desc" aria-hidden="true"></i>', $item_output);
            
        }
    }
    if (is_user_logged_in()){
        if ($item->post_title == "Đăng nhập"){
            $logoutURL = 'href="'.wp_logout_url().'"';
            $item_output = preg_replace('/href="(.*)"/',$logoutURL, $item_output);
            $item_output = str_replace('>Đăng nhập', '><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất ', $item_output);
            
        }
    }else{
        if ($item->post_title == "Đăng nhập"){
            $loginURL = 'href="'.wp_login_url().'"';
            $item_output = preg_replace('/href="(.*)"/',$loginURL, $item_output);
            $item_output = str_replace('>Đăng nhập', '><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập', $item_output);
            
            // echo "<pre>";
            // print_r($item_output);
            // echo "</pre>";
        }
    }
    return $item_output;
}
*/


