<header class="header">
    <div class="container">
        <div class="row ">
            <div class="header__wrap">
                <div class="logo ">
                    <a href="<?php echo get_home_url(); ?>"><img
                            src="<?php echo DTTL_THEME_URL_IMG; ?>/taihoa-white.svg" alt="logo"></a>
                </div>
                <div class="navbar">
                    <?php
                        if(has_nav_menu('main_menu')){
                            $args = array(
                                'menu'                 => '',
                                'container'            => '',
                                'container_class'      => '',
                                'container_id'         => '',
                                'container_aria_label' => '',
                                'menu_class'           => '',
                                'menu_id'              => '',
                                'echo'                 => true,
                                'fallback_cb'          => 'wp_page_menu',
                                'before'               => '',
                                'after'                => '',
                                'link_before'          => '',
                                'link_after'           => '',
                                'items_wrap'           => '<ul class="header__navbar">%3$s<hr/></ul>',//%3$s tương ứng với giá trị trong cặp thẻ li đưa vào
                                'item_spacing'         => 'preserve',
                                'depth'                => 3,// cho phép menu hiện 2 cấp nếu bằng 0 thì hiện tất cả các cấp bằng 1 thì chỉ hiện menu cha
                                'walker'               => '',
                                'theme_location'       => 'main_menu',
                            );
                            wp_nav_menu( $args );
                        }
                    ?>

                </div>

                <div class="search ">
                    <div class="search-container">
                        <form role="search" method="get" id="searchform" class="searchform"
                            action="<?php echo esc_url( home_url( '/' ) ); ?>">


                                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Tìm kiếm sản phẩm..."/>
                                <button type="submit"><i class="demo-icon icon-search"></i></button>

                        </form>
                        <!-- <form>
                            <input type="text" placeholder="Tìm kiếm sản phẩm..." name="search">
                        </form>
                        <button type="submit"><i class="demo-icon icon-search"></i></button> -->
                    </div>
                </div>
                <div class="hamburger">
                    <div></div>
                </div>
            </div>
            <div class="header__mobile">

                <div class="menu-right">
                    <?php
                            if(has_nav_menu('mobile_menu')){
                                $args = array(
                                    'menu'                 => '',
                                    'container'            => '',
                                    'container_class'      => '',
                                    'container_id'         => '',
                                    'container_aria_label' => '',
                                    'menu_class'           => '',
                                    'menu_id'              => '',
                                    'echo'                 => true,
                                    'fallback_cb'          => 'wp_page_menu',
                                    'before'               => '',
                                    'after'                => '',
                                    'link_before'          => '',
                                    'link_after'           => '',
                                    'items_wrap'           => '<ul>%3$s</ul>',//%3$s tương ứng với giá trị trong cặp thẻ li đưa vào
                                    'item_spacing'         => 'preserve',
                                    'depth'                => 1,// cho phép menu hiện 2 cấp nếu bằng 0 thì hiện tất cả các cấp bằng 1 thì chỉ hiện menu cha
                                    'walker'               => '',
                                    'theme_location'       => 'mobile_menu',
                                );
                                wp_nav_menu( $args );
                            }
                        ?>

                    <div class="search ">
                        <div class="search-container">
                            <form>
                                <input type="text" placeholder="Tìm kiếm sản phẩm..." name="search">
                            </form>
                            <button type="submit"><i class="demo-icon icon-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>