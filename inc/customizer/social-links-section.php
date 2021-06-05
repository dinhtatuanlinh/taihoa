<?php
class Social_Links_Section{

    public function __construct($theme_mods = array()){
        // echo '<pre>';
        // print_r($theme_mods);
        // echo '</pre>';
        add_action('customize_register', array($this, 'social_links'));
        add_action('wp_head', array($this, 'customize_css'));
        add_action('customize_preview_init', array($this, 'customize_live_preview'));
    }
    public function customize_css(){}
    public function customize_live_preview(){
        $jsUrl = get_template_directory_uri() . '/dest';
        //gọi tập tin theme-customize.js vào đồng thời gọi jquery và customize-preview là hàm preview có sẵn của wp
        wp_enqueue_script('theme_customize', 
                            $jsUrl . '/theme-customize.js', 
                            array('jquery', 'customize-preview'), 
                            '1.0.0', 
                            true);
        
    }
    public function social_links($wp_customize){
        
        // tạo section trong customize
        $sectionID = 'dttl_social_links';
        $wp_customize->add_section($sectionID, array(
            'title' => __('Social links', 'Streetwear'),
            'description' => __('Link mạng xã hội', 'Streetwear'),
            'priority' => 20
        ));

        // -------------------------
        // tạo phần tử text cho facebook
        // -------------------------
        $inputName = 'facebook';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID, array(
            'default' => 'facebook.com',// thông số mặc định cho phần tử trong section
            'capability' => 'edit_theme_options',// phân quyền có thể chỉnh sửa cho user
            'type' => 'theme_mod',// lưu dữ liệu dưới option name là theme_mod hay có thể đặt là 'option' dự liệu sẽ lưu dưới một option name riêng
            // 'type' => 'option',// lưu dữ liệu trên bảng option với option name là $sectionID
            'transport' => 'postMessage',// dữ liệu sẽ xuất hiện sau khi refresh lại trang hoặc 'postMessage' dữ liệu sẽ xuất hiện ngay lập tức
            // 'sanitize_callback' => 'sanitize_DDN_theme_site_name'// tên của hàm lọc dữ liệu đưa vào
        ));
        $controlID = 'social-links-' . $inputName;
        $wp_customize->add_control($controlID, array(
            'label' => __('Facebook', 'Streetwear'),// Tên cho phần tử trong section
            'section' => $sectionID,// tên của section mà phần tử đang chứa trong
            'settings' => $settingID,// tên của setting mà cài đặt cho phần tử này
            'type' => 'text',// kiểu dữ liệu của phần tử
        ));
        // -------------------------
        // tạo phần tử text cho email
        // -------------------------
        $inputName = 'youtube';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID, array(
            'default' => 'youtube.com',// thông số mặc định cho phần tử trong section
            'capability' => 'edit_theme_options',// phân quyền có thể chỉnh sửa cho user
            'type' => 'theme_mod',// lưu dữ liệu dưới option name là theme_mod hay có thể đặt là 'option' dự liệu sẽ lưu dưới một option name riêng
            // 'type' => 'option',// lưu dữ liệu trên bảng option với option name là $sectionID
            'transport' => 'postMessage',// dữ liệu sẽ xuất hiện sau khi refresh lại trang hoặc 'postMessage' dữ liệu sẽ xuất hiện ngay lập tức
            // 'sanitize_callback' => 'sanitize_DDN_theme_site_name'// tên của hàm lọc dữ liệu đưa vào
        ));
        $controlID = 'social-links-' . $inputName;
        $wp_customize->add_control($controlID, array(
            'label' => __('youtube', 'Streetwear'),// Tên cho phần tử trong section
            'section' => $sectionID,// tên của section mà phần tử đang chứa trong
            'settings' => $settingID,// tên của setting mà cài đặt cho phần tử này
            'type' => 'text',// kiểu dữ liệu của phần tử
        ));
        // -------------------------
        // tạo phần tử link instagram
        // -------------------------
        $inputName = 'instagram';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID, array(
            'default' => 'instagram.com',// thông số mặc định cho phần tử trong section
            'capability' => 'edit_theme_options',// phân quyền có thể chỉnh sửa cho user
            'type' => 'theme_mod',// lưu dữ liệu dưới option name là theme_mod hay có thể đặt là 'option' dự liệu sẽ lưu dưới một option name riêng
            // 'type' => 'option',// lưu dữ liệu trên bảng option với option name là $sectionID
            'transport' => 'postMessage',// dữ liệu sẽ xuất hiện sau khi refresh lại trang hoặc 'postMessage' dữ liệu sẽ xuất hiện ngay lập tức
            // 'sanitize_callback' => 'sanitize_DDN_theme_site_name'// tên của hàm lọc dữ liệu đưa vào
        ));
        $controlID = 'social-links-' . $inputName;
        $wp_customize->add_control($controlID, array(
            'label' => __('instagram', 'Streetwear'),// Tên cho phần tử trong section
            'section' => $sectionID,// tên của section mà phần tử đang chứa trong
            'settings' => $settingID,// tên của setting mà cài đặt cho phần tử này
            'type' => 'text',// kiểu dữ liệu của phần tử
        ));
    }
}