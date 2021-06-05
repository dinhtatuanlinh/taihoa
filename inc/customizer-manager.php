<?php
class dttl_Theme_Customizer_Manager{
    private $_theme_mods = array();
    public function __construct(){
        $options = array(
            'theme-elements' => false,
            'about' => false,
            'social-links' => true,
            'background' => true,
            'logo' => true
        );
        $this->_theme_mods = get_theme_mods();// truyền dữ liệu từ theme mod vào biến $_theme_mods để sử dụng
        // echo '<pre>';
        // print_r($this->_theme_mods);
        // echo '</pre>';
        // if (isset($options['theme-elements']) == true) $this->theme_elements();
        if (isset($options['about']) == true) $this->about_section();
        if (isset($options['social-links']) == true) $this->social_links();
        if (isset($options['background']) == true) $this->background();
        if (isset($options['logo']) == true) $this->logo();
    }
    public function theme_elements(){
        require_once STREETWEAR_THEME_CUSTOMIZER_DIR . '/theme-elements-section.php';
        new taife_Theme_Elements_Section($this->_theme_mods);
        // biến $this->_theme_mods được truyền vào lớp DDN_Theme_Elements_Section để có thể lấy dữ liệu của biến này bên trong lớp
    }
    public function about_section(){
        require_once STREETWEAR_THEME_CUSTOMIZER_DIR . '/about-section.php';
        new About_Section($this->_theme_mods);
    }
    public function social_links(){
        require_once STREETWEAR_THEME_CUSTOMIZER_DIR . '/social-links-section.php';
        new Social_Links_Section($this->_theme_mods);
    }
    public function background(){
        require_once STREETWEAR_THEME_CUSTOMIZER_DIR . '/background-section.php';
        new Background_Section($this->_theme_mods);
    }

    public function logo(){
        require_once STREETWEAR_THEME_CUSTOMIZER_DIR . '/logo-section.php';
        new Logo_Section($this->_theme_mods);
    }
    // để update giá trị cho một option_name nào đó trong bảng option ta sử dụng
    // update_option('tên của option_name muốn thay đôi', 'giá trị thay đổi')
    // việc này để thêm vào giá trị customize mặc định sau khi thay đổi theme
    public function background_data($val = ''){// hàm này sẽ lấy dữ liệu từ customize ra để sử dụng ngoài theme
        // if(empty($val)) return false;
        $options = $this->_theme_mods['dttl_background'];// lấy dữ liệu trong section có sectionID là DDN_theme_elements để đưa ra ngoài

            return $options;
    }
    public function logo_data($val = ''){// hàm này sẽ lấy dữ liệu từ customize ra để sử dụng ngoài theme
        // if(empty($val)) return false;
        $options = $this->_theme_mods['dttl_logo'];// lấy dữ liệu trong section có sectionID là DDN_theme_elements để đưa ra ngoài
        // if($val == 'desktop'){
            return $options;
        // }
    }
    public function social_links_data($val = ''){// hàm này sẽ lấy dữ liệu từ customize ra để sử dụng ngoài theme
        // if(empty($val)) return false;
        $options = $this->_theme_mods['dttl_social_links'];// lấy dữ liệu trong section có sectionID là DDN_theme_elements để đưa ra ngoài
        // if($val == 'desktop'){
            return $options;
        // }
    }
}