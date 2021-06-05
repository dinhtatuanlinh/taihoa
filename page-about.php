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
                    <h1 class="title">Về chúng tôi?</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque nobis culpa odit maiores
                        cupiditate reprehenderit quasi consequatur excepturi reiciendis dolorum quos voluptas facere
                        magni eum, nihil saepe harum iure minus?
                        Sint alias aspernatur, tempora perferendis illum temporibus sit pariatur nam nostrum dolorum
                        ullam dicta, perspiciatis officia animi nulla assumenda, tenetur minus nihil aliquam
                        dignissimos excepturi possimus recusandae ratione corrupti. Dolor?
                        Cupiditate ullam ipsa corrupti nisi quaerat ratione tenetur, in expedita illo quo quasi a
                        est, soluta at laborum obcaecati tempore deserunt sed nobis vero. Hic suscipit veritatis
                        quibusdam quod delectus!
                        Unde temporibus, a corporis et quis voluptatem quibusdam, fuga, deserunt similique optio
                        aliquam. Impedit veniam, pariatur aspernatur error ipsum modi commodi eligendi qui, delectus
                        nostrum vel totam maxime vitae aliquam.</p>
                </div>
                <div class="about-text">
                    <h2 class="title">Chúng tôi làm gì?</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque nobis culpa odit maiores
                        cupiditate reprehenderit quasi consequatur excepturi reiciendis dolorum quos voluptas facere
                        magni eum, nihil saepe harum iure minus?
                        Sint alias aspernatur, tempora perferendis illum temporibus sit pariatur nam nostrum dolorum
                        ullam dicta, perspiciatis officia animi nulla assumenda, tenetur minus nihil aliquam
                        dignissimos excepturi possimus recusandae ratione corrupti. Dolor?
                        Cupiditate ullam ipsa corrupti nisi quaerat ratione tenetur, in expedita illo quo quasi a
                        est, soluta at laborum obcaecati tempore deserunt sed nobis vero. Hic suscipit veritatis
                        quibusdam quod delectus!
                </div>
                <div class="about-text">
                    <h3 class="title">Tại sao nên chọn?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque nobis culpa odit maiores
                        cupiditate reprehenderit quasi consequatur excepturi reiciendis dolorum quos voluptas facere
                        magni eum, nihil saepe harum iure minus?
                        Sint alias aspernatur, tempora perferendis illum temporibus sit pariatur nam nostrum dolorum
                        ullam dicta, perspiciatis officia animi nulla assumenda, tenetur minus nihil aliquam
                        dignissimos excepturi possimus recusandae ratione corrupti. Dolor?
                </div>
            </section>
        </div>
    </div>
</main>

<?php
get_footer();
?>