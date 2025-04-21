<?php
get_header();
while (have_posts()) {

    // تجهيز المقال الحالي للعرض
    the_post();
    ?>

    <!-- عنوان المقال داخل وسم <h1>، مع رابط يؤدي إلى صفحة المقال -->
    <h2>
        <!-- <a href="<?php the_permalink(); ?>"> -->
        <?php the_title(); // عرض عنوان المقال ?>
        <!-- </a> -->
    </h2>

    <?php
    // عرض محتوى المقال
    the_content();
    ?>
    <hr>
    <!-- خط فاصل بين كل مقال -->
    <!-- <hr> -->

    <?php
} // نهاية حلقة while

get_footer();
?>