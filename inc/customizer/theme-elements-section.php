<?php
class taife_Theme_Elements_Section{

    public function __construct($theme_mods = array()){
        // echo '<pre>';
        // print_r($theme_mods);
        // echo '</pre>';
        add_action('customize_register', array($this, 'theme_elements'));
        add_action('wp_head', array($this, 'customize_css'));
        add_action('customize_preview_init', array($this, 'customize_live_preview'));
    }
    public function customize_css(){}
    public function customize_live_preview(){
        //gọi tập tin theme-customize.js vào đồng thời gọi jquery và customize-preview là hàm preview có sẵn của wp
        wp_enqueue_script('ddn_theme_customize', 
                            DDN_THEME_JS_URL . '/theme-customize.js', 
                            array('jquery', 'customize-preview'), 
                            '1.0.0', 
                            true);
        
    }
    public function theme_elements($wp_customize){
        
        // tạo section trong customize
        $sectionID = 'DDN_theme_elements';
        $wp_customize->add_section($sectionID, array(
            'title' => __('Theme elements', 'dotdapnhom'),
            'description' => __('Hiển thị các phần tử trong website', 'dotdapnhom'),
            'priority' => 20
        ));
        // -------------------------
        // tạo phần tử logo web
        // -------------------------
        $inputName = 'logoWeb';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID, array(
            'default' => '',// thông số mặc định cho phần tử trong section
            'capability' => 'edit_theme_options',// phân quyền có thể chỉnh sửa cho user
            'type' => 'theme_mod',// lưu dữ liệu dưới option name là theme_mod hay có thể đặt là 'option' dự liệu sẽ lưu dưới một option name riêng
            // 'type' => 'option',// lưu dữ liệu trên bảng option với option name là $sectionID
            'transport' => 'postMessage',// dữ liệu sẽ xuất hiện sau khi refresh lại trang hoặc 'postMessage' dữ liệu sẽ xuất hiện ngay lập tức
            // 'sanitize_callback' => 'sanitize_DDN_theme_site_name'// tên của hàm lọc dữ liệu đưa vào
        ));
        $controlID = 'DDN-theme-elements-' . $inputName;
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $controlID, array(
            'label' => __('Upload logo web', 'dotdapnhom'),// Tên cho phần tử trong section
            'section' => $sectionID,// tên của section mà phần tử đang chứa trong
            'settings' => $settingID,// tên của setting mà cài đặt cho phần tử này
            // 'type' => 'checkbox',// kiểu dữ liệu của phần tử

        )));



        // -------------------------
        // tạo phần tử textarea cho Slogan
        // -------------------------
        $inputName = 'Slogan';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID, array(
            'default' => 'this is slogan',// thông số mặc định cho phần tử trong section
            'capability' => 'edit_theme_options',// phân quyền có thể chỉnh sửa cho user
            'type' => 'theme_mod',// lưu dữ liệu dưới option name là theme_mod hay có thể đặt là 'option' dự liệu sẽ lưu dưới một option name riêng
            // 'type' => 'option',// lưu dữ liệu trên bảng option với option name là $sectionID
            'transport' => 'postMessage',// dữ liệu sẽ xuất hiện sau khi refresh lại trang hoặc 'postMessage' dữ liệu sẽ xuất hiện ngay lập tức
            // 'sanitize_callback' => 'sanitize_DDN_theme_site_name'// tên của hàm lọc dữ liệu đưa vào
        ));
        $controlID = 'DDN-theme-elements-' . $inputName;
        $wp_customize->add_control($controlID, array(
            'label' => __('Slogan', 'dotdapnhom'),// Tên cho phần tử trong section
            'section' => $sectionID,// tên của section mà phần tử đang chứa trong
            'settings' => $settingID,// tên của setting mà cài đặt cho phần tử này
            'type' => 'textarea',// kiểu dữ liệu của phần tử
        ));
       
        // -------------------------
        // tạo phần tử textarea cho Slogan
        // -------------------------
        $inputName = 'hotline';
        $settingID = $sectionID . '[' . $inputName . ']';
        $wp_customize->add_setting($settingID, array(
            'default' => '',// thông số mặc định cho phần tử trong section
            'capability' => 'edit_theme_options',// phân quyền có thể chỉnh sửa cho user
            'type' => 'theme_mod',// lưu dữ liệu dưới option name là theme_mod hay có thể đặt là 'option' dự liệu sẽ lưu dưới một option name riêng
            // 'type' => 'option',// lưu dữ liệu trên bảng option với option name là $sectionID
            'transport' => 'postMessage',// dữ liệu sẽ xuất hiện sau khi refresh lại trang hoặc 'postMessage' dữ liệu sẽ xuất hiện ngay lập tức
            // 'sanitize_callback' => 'sanitize_DDN_theme_site_name'// tên của hàm lọc dữ liệu đưa vào
        ));
        $controlID = 'DDN-theme-elements-' . $inputName;
        $wp_customize->add_control($controlID, array(
            'label' => __('Hotline', 'dotdapnhom'),// Tên cho phần tử trong section
            'section' => $sectionID,// tên của section mà phần tử đang chứa trong
            'settings' => $settingID,// tên của setting mà cài đặt cho phần tử này
            'type' => 'text',// kiểu dữ liệu của phần tử
        ));


    }
}