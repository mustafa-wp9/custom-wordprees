<?php

// دالة لتحميل ملفات CSS و JavaScript الخاصة بالقالب
function custom_files()
{
    // تحميل ملف CSS الرئيسي الخاص بالقالب
    wp_enqueue_style('custom_main_styles', get_theme_file_uri('/build/style-index.css'));

    // تحميل ملف CSS إضافي (ربما يحتوي على تخصيصات أخرى)
    wp_enqueue_style('custom_extra_styles', get_theme_file_uri('/build/index.css'));

    // تحميل مكتبة Font Awesome لإظهار الأيقونات
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    // تحميل خطوط Google Fonts (يرجى الانتباه أن الرابط ناقص http/https)
    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');

    // تحميل ملف JavaScript الرئيسي مع تحديد تبعيته لـ jQuery وتشغيله في تذييل الصفحة
    wp_enqueue_script('main-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);

    // إضافة متغيرات JavaScript للاستخدام في ملفات JS
    wp_localize_script('main-js', 'customData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}

// ربط دالة تحميل الملفات بحدث wp_enqueue_scripts
add_action('wp_enqueue_scripts', 'custom_files');

// دالة لتفعيل المزايا المختلفة للثيم
function custom_features()
{
    // دعم عنوان الصفحة

    register_nav_menu('headerMenulocation', 'Header Menu location');
    register_nav_menu('footerlocationOne', 'Footer Location One');
    register_nav_menu('footerlocationTow', 'Footer Location Two');
    add_theme_support('title-tag');

}

add_action('after_setup_theme', 'custom_features');

