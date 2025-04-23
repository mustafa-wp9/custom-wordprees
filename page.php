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
        $parent_id = wp_get_post_parent_id(get_the_ID());
        if ($parent_id) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_permalink($parent_id); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parent_id); ?>
                    </a>
                    <span class="metabox__main"><?php the_title(); ?></span>
                </p>
            </div>
        <?php }

        $children = get_pages(array(
            'child_of' => get_the_ID()
        ));

        if ($parent_id || $children) { ?>
            <div class="page-links">
                <h2 class="page-links__title">
                    <a href="<?php echo get_permalink($parent_id); ?>"><?php echo get_the_title($parent_id); ?></a>
                </h2>
                <ul class="min-list">
                    <?php
                    if ($parent_id) {
                        $find_children_of = $parent_id;
                    } else {
                        $find_children_of = get_the_ID();
                    }

                    wp_list_pages(array(
                        'title_li' => NULL,
                        'child_of' => $find_children_of,
                        'sort_column' => 'menu_order'
                    ));
                    ?>
                </ul>
            </div>
        <?php } ?>
    </div>

    <!-- عرض محتوى المقال -->
    <div class="generic-content">
        <?php the_content(); ?> <!-- عرض محتوى المقال الذي كتبه الكاتب -->
    </div>
    </div>

<?php } // نهاية حلقة الـ while
get_footer(); // جلب تذييل الصفحة (الـ Footer)
?>