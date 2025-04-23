<?php
/**
 * قالب صفحة تسجيل الدخول المخصصة
 * Template Name: صفحة تسجيل الدخول
 */

get_header(); 

// التحقق مما إذا كان المستخدم مسجل دخوله بالفعل
if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}
?>

<div class="page-banner">
    <div class="page-banner__bg-image" 
         style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg') ?>)">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">تسجيل الدخول</h1>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="login-form-container">
        <?php
        // عرض رسائل الخطأ إن وجدت
        if (isset($_GET['login']) && $_GET['login'] == 'failed') {
            echo '<div class="alert alert-error">خطأ في اسم المستخدم أو كلمة المرور</div>';
        }
        ?>
        
        <form action="<?php echo esc_url(site_url('wp-login.php')); ?>" method="post" class="login-form">
            <div class="form-group">
                <label for="user_login">اسم المستخدم</label>
                <input type="text" name="log" id="user_login" class="form-control" required placeholder="ادخل اسم المستخدم">
            </div>

            <div class="form-group">
                <label for="user_pass">كلمة المرور</label>
                <input type="password" name="pwd" id="user_pass" class="form-control" required placeholder="ادخل كلمة المرور">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="rememberme" value="forever">
                    تذكرني
                </label>
            </div>

            <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url()); ?>">
            <button type="submit" class="btn btn--blue">تسجيل الدخول</button>
        </form>

        <div class="login-links">
            <a href="<?php echo wp_lostpassword_url(); ?>">نسيت كلمة المرور؟</a>
            <?php if (get_option('users_can_register')) : ?>
                | <a href="<?php echo wp_registration_url(); ?>">تسجيل حساب جديد</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
