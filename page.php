<?php
get_header(); // جلب ترويسة الصفحة (الـ Header)

while (have_posts()) { // بدء حلقة الـ WordPress لعرض المقالات
    the_post(); // إعداد المقال الحالي للعرض

    // عرض القسم الذي يحتوي على صورة الخلفية الخاصة بالصفحة وعنوان المقال
    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image"
            style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1> <!-- عرض عنوان المقال -->
            <div class="page-banner__intro">
                <p>Learn how the school of your dreams got started.</p> <!-- مقدمة قصيرة عن المقال -->
            </div>
        </div>
    </div>
    <!-- عرض المحتوى الرئيسي للمقال داخل صفحة محتوى مخصصة -->
    <div class="container container--narrow page-section">
        <!-- عرض رابط العودة إلى صفحة "About Us" مع أيقونة -->

        <?php
        // التحقق مما إذا كانت الصفحة الحالية لها صفحة أصل
        if (wp_get_post_parent_id(get_the_ID())) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo site_url('/about-us'); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title(); ?>
                    </a>
                    <span class="metabox__main"><?php the_title(); ?></span> <!-- عنوان المقال الحالي -->
                </p>
            </div>
        <?php } ?>
    </div>

    <!-- روابط الصفحة الجانبية مثل "Our Goals" و "Our History" -->
    <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo site_url('/about-us'); ?>">About Us</a></h2>
        <!-- رابط إلى صفحة "About Us" -->
        <ul class="min-list">
            <li class="current_page_item"><a href="#">Our History</a></li> <!-- الصفحة الحالية -->
            <li><a href="#">Our Goals</a></li> <!-- رابط إلى "Our Goals" -->
        </ul>
    </div>

    <!-- عرض محتوى المقال -->
    <div class="generic-content">
        <?php the_content(); ?> <!-- عرض محتوى المقال الذي كتبه الكاتب -->
    </div>
    </div>

<?php } // نهاية حلقة الـ while
get_footer(); // جلب تذييل الصفحة (الـ Footer)
?>