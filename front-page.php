<?php get_header(); // استدعاء ملف الهيدر ?>
<!-- بانر الصفحة الرئيسية -->
<div class="page-banner">
    <!-- صورة الخلفية الخاصة بالبانر -->
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>)"></div>

    <!-- محتوى البانر: العنوان والترحيب وزر -->
    <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1> <!-- عنوان رئيسي مرحب -->
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2> <!-- رسالة ترحيب إضافية -->
        <h3 class="headline headline--small">
            Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?
        </h3> <!-- دعوة لاختيار تخصص دراسي -->

        <!-- زر يدعو المستخدم لاختيار التخصص -->
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
    </div>
</div>

<!-- تقسيم الصفحة إلى نصفين (تصميم عرض كامل بعرضين متساويين) -->
<div class="full-width-split group">

    <!-- القسم الأول: عرض الأحداث القادمة -->
    <div class="full-width-split__one">
        <div class="full-width-split__inner">

            <!-- عنوان القسم -->
            <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

            <!-- الحدث الأول -->
            <div class="event-summary">

                <!-- التاريخ (شهر ويوم) -->
                <a class="event-summary__date t-center" href="#">
                    <span class="event-summary__month">Mar</span> <!-- شهر الحدث -->
                    <span class="event-summary__day">25</span> <!-- يوم الحدث -->
                </a>

                <!-- تفاصيل الحدث -->
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny">
                        <a href="#">Poetry in the 100</a> <!-- عنوان الحدث -->
                    </h5>
                    <p>
                        Bring poems you’ve wrote to the 100 building this Tuesday for an open mic and snacks.
                        <a href="#" class="nu gray">Learn more</a> <!-- رابط للمزيد من التفاصيل -->
                    </p>
                </div>
            </div>

            <!-- الحدث الثاني -->
            <div class="event-summary">
                <a class="event-summary__date t-center" href="#">
                    <span class="event-summary__month">Apr</span>
                    <span class="event-summary__day">02</span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny">
                        <a href="#">Quad Picnic Party</a>
                    </h5>
                    <p>
                        Live music, a taco truck and more can be found at our third annual quad picnic day.
                        <a href="#" class="nu gray">Learn more</a>
                    </p>
                </div>
            </div>

            <!-- زر لعرض جميع الأحداث -->
            <p class="t-center no-margin">
                <a href="#" class="btn btn--blue">View All Events</a>
            </p>

        </div>
    </div>

    <!-- القسم الثاني: من مدونتنا -->
    <div class="full-width-split__two">
        <div class="full-width-split__inner">

            <!-- عنوان القسم -->
            <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

            <!-- عرض المقالات الحديثة بشكل ديناميكي -->
            <?php
            $homepagePosts = new WP_Query(array(
                'posts_per_page' => 2
            ));

            while ($homepagePosts->have_posts()) {
                $homepagePosts->the_post(); ?>
                <div class="event-summary">
                    <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                        <span class="event-summary__month"><?php the_time('M'); ?></span>
                        <span class="event-summary__day"><?php the_time('d'); ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h5>
                        <p><?php echo wp_trim_words(get_the_content(), 18); ?>
                            <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a>
                        </p>
                    </div>
                </div>
            <?php }
            wp_reset_postdata();
            ?>

            <!-- زر لعرض جميع التدوينات -->
            <p class="t-center no-margin">
                <a href="#" class="btn btn--yellow">View All Blog Posts</a>
            </p>
        </div>
    </div>
</div> <!-- إغلاق ال div الخاص بالتقسيم الكامل -->
<div class="hero-slider">
    <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">

            <!-- الشريحة الأولى -->
            <div class="hero-slider__slide"
                style="background-image: url(<?php echo get_theme_file_uri('images/bus.jpg'); ?>)">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Free Transportation</h2>
                        <p class="t-center">All students have free unlimited bus fare.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>

            <!-- الشريحة الثانية -->
            <div class="hero-slider__slide"
                style="background-image: url(<?php echo get_theme_file_uri('images/apples.jpg'); ?>)">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                        <p class="t-center">Our dentistry program recommends eating apples.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>

            <!-- الشريحة الثالثة -->
            <div class="hero-slider__slide"
                style="background-image: url(<?php echo get_theme_file_uri('images/bread.jpg'); ?>)">
                <div class="hero-slider__interior container">
                    <div class="hero-slider__overlay">
                        <h2 class="headline headline--medium t-center">Free Food</h2>
                        <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                        <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
                    </div>
                </div>
            </div>

        </div>

        <!-- النقاط التي تظهر حالة الشريحة -->
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
</div>

<?php get_footer(); ?>