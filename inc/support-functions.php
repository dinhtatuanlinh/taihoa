<?php
// lấy url từ ảnh trong bài viết
function get_img_url($post_content){
    $image = '';
    if(!empty($post_content)){
        preg_match_all('|<img.*?src=[\'"](.*?)[\'"].*?>|i', $post_content, $matches);
    }
    if(isset($matches))$image = $matches[1][0];
    return $image;
}
// resize lại kích thước của ảnh để tối ưu tốc độ load website
function get_new_img_url($imgUrl, $width = 0, $heigt = 0 ,	$suffixes = '-dttl-'){
    $suffixes = $suffixes . $width . 'x'. $heigt;

    //Lay ten tap tin hinh anh hien tai
    preg_match("/[^\/|\\\]+$/", $imgUrl, $currentName);
    $currentName = $currentName[0];

    //Tạo tên mới cho hình ảnh dựa trên tên cũ
    $tmpFileName = explode('.', $currentName);
    $newFileName = $tmpFileName[0] . $suffixes . '.' . $tmpFileName[1];

    //Chuyển từ đường dẫn URL sang PATH
    $tmp 	= explode('/wp-content/', $imgUrl);
    $imgDir = ABSPATH.'wp-content/' . $tmp[1];


    $newImgDir = str_replace($currentName, $newFileName, $imgDir);
    //echo '<br>' . $newImgDir;
    if(!file_exists($newImgDir)){			
        $wpImageEditor =  wp_get_image_editor( $imgDir);
        if ( ! is_wp_error( $wpImageEditor ) ) {
            $wpImageEditor->resize($width, $heigt, array('center','center'));
            $wpImageEditor->save( $newImgDir);
        }
    }
    $newImgUrl= str_replace($currentName, $newFileName, $imgUrl);

    return $newImgUrl;
}
//CODE LAY LUOT XEM
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "01 lượt xem";
    }
    return $count.' lượt xem';
}
 
// CODE DEM LUOT XEM
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
  
//CODE HIEN THI SO LUOT XEM BAI VIET TRONG DASHBOARDH
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}
