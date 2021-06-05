<?php 
get_header(); 
get_header('menu');

$upload_dir = wp_upload_dir();

// echo '<pre style="color: #fff">';
// print_r($upload_dir['url']);
// echo '</pre>';
?>
<main class="about-page">
    <div class="container">
        <div class="row">
            <section class="col-lg-12 about-page__img">
                <div class="about-img">
                    <img src="https://tinhlamjw.com/wp-content/uploads/2020/09/about-us-1.jpg" alt="">
                </div>

            </section>
            <section class="col-lg-12 about-page__text">

                <div class="about-text">
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div id="content">
                        <?php
                        the_content();
                        ?>
                    </div>

                </div>

            </section>
        </div>
    </div>

</main>

<?php
get_footer();
?>