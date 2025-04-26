<!DOCTYPE html> <!-- تعريف نوع المستند HTML5 -->
<html lang="en"> <!-- بداية وسم HTML وتحديد لغة الصفحة -->

<head>
   <meta charset="UTF-8"> <!-- تعيين ترميز الأحرف إلى UTF-8 -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- دعم العرض بشكل جيد على جميع الأجهزة -->

   <?php wp_head(); ?> <!-- استدعاء ملفات CSS وJS التي تم ربطها بـ wp_enqueue (ضروري داخل الوسم <head>) -->
</head>

<body <?php body_class(); ?>>
   <!-- بداية رأس الموقع -->
   <header class="site-header">
      <div class="container">
         <!-- شعار الموقع -->
         <h1 class="school-logo-text float-left">
            <a href="http://custom-wordprees.local"><strong>custom</strong>-themes</a>
         </h1>

         <!-- عناصر التنقل والبحث -->
         <div class="ios1">
            <!-- زر تفعيل البحث -->
            <span class="js-search-trigger site-header__search-trigger">
               <i class="fa fa-search" aria-hidden="true"></i>
            </span>

            <!-- زر فتح القائمة الجانبية (عادة في الجوال) -->
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>

            <!-- القائمة الرئيسية للموقع -->
            <div class="site-header__menu group">
               <nav class="main-navigation">
                  <?php
                  wp_nav_menu(array(
                     'theme_location' => 'headerMenulocation',
                  ));
                  ?>
               </nav>
               <!-- <ul>
                     <li><a href=" <?php echo site_url('/about-us') ?>">About Us</a></li>
                     <li><a href="#">Programs</a></li>
                     <li><a href="#">Events</a></li>
                     <li><a href="#">Campuses</a></li>
                     <li><a href="#">Blog</a></li>
                  </ul> -->
               </nav>
               
               <!-- أدوات الدخول والتسجيل والبحث -->
               <div class="site-header__util">
                  <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                  <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                  <!-- زر البحث مكرر هنا لأغراض تصميمية -->
                  <span class="search-trigger js-search-trigger">
                     <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
               </div>
            </div>
         </div>
      </div> <!-- نهاية div.container -->
   </header> <!-- نهاية رأس الموقع -->