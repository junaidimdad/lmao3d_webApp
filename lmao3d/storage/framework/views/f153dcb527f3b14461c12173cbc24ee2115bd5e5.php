<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>LMAO 3D</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <!-- Favicons -->
  <link href="<?php echo e(URL::asset('Content/img/favicon.png')); ?>" rel="icon">
  <link href="<?php echo e(URL::asset('Content/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo e(URL::asset('Content/lib/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo e(URL::asset('Content/lib/nivo-slider/css/nivo-slider.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(URL::asset('Content/lib/owlcarousel/owl.carousel.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(URL::asset('Content/lib/owlcarousel/owl.transitions.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(URL::asset('Content/lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(URL::asset('Content/lib/animate/animate.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(URL::asset('Content/lib/venobox/venobox.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">

  <!-- Nivo Slider Theme -->
  <link href="<?php echo e(URL::asset('Content/css/nivo-slider-theme.css')); ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo e(URL::asset('Content/css/style.css')); ?>" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="<?php echo e(URL::asset('Content/css/responsive.css')); ?>" rel="stylesheet">

  <!-- Forum Stylesheet File -->
  <link href="<?php echo e(URL::asset('Content/css/forum.css')); ?>" rel="stylesheet">

  <!-- Scripts -->
  <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>;
  </script>
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

<header>
<?php $__env->startSection('header'); ?>
<?php echo $__env->yieldSection(); ?>
</header>

<?php $__env->startSection('all-title-box'); ?>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('threads'); ?>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('thread-form-content'); ?>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('single-thread-content'); ?>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('category-client'); ?>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('content-client-thread'); ?>
<?php echo $__env->yieldSection(); ?>
<!-- Start contact Area -->
<div id="contact" class="contact-area">
<?php $__env->startSection('contact-area'); ?>
<?php echo $__env->yieldSection(); ?>
</div>


 <?php $__env->startSection('slider-area'); ?>
 <?php echo $__env->yieldSection(); ?>


 <?php $__env->startSection('about-area'); ?>
 <?php echo $__env->yieldSection(); ?>


 <?php $__env->startSection('services-area'); ?>
 <?php echo $__env->yieldSection(); ?>


 <?php $__env->startSection('wellcome-area'); ?>
 <?php echo $__env->yieldSection(); ?>


 <?php $__env->startSection('faq-area'); ?>
 <?php echo $__env->yieldSection(); ?>

 <?php $__env->startSection('our-team-area'); ?>
 <?php echo $__env->yieldSection(); ?>


 <?php $__env->startSection('reviews-area'); ?>
 <?php echo $__env->yieldSection(); ?>


 <?php $__env->startSection('portfolio-area'); ?>
 <?php echo $__env->yieldSection(); ?>


 <?php $__env->startSection('testimonials-area'); ?>
 <?php echo $__env->yieldSection(); ?>



 <?php $__env->startSection('blog-area'); ?>
 <?php echo $__env->yieldSection(); ?>




  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->


  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>L</span>MAO 3D</h2>
                </div>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +123 456 789</p>
                  <p><span>Email:</span> contact@example.com</p>
                  <p><span>Working Hours:</span> 9am-5pm</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="<?php echo e(URL::asset('Content/img/portfolio/1.jpg')); ?>" alt=""></a>
                  <a href="#"><img src="<?php echo e(URL::asset('Content/img/portfolio/2.jpg')); ?>" alt=""></a>
                  <a href="#"><img src="<?php echo e(URL::asset('Content/img/portfolio/3.jpg')); ?>" alt=""></a>
                  <a href="#"><img src="<?php echo e(URL::asset('Content/img/portfolio/4.jpg')); ?>" alt=""></a>
                  <a href="#"><img src="<?php echo e(URL::asset('Content/img/portfolio/5.jpg')); ?>" alt=""></a>
                  <a href="#"><img src="<?php echo e(URL::asset('Content/img/portfolio/6.jpg')); ?>" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>LMAO 3D</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">

              Designed by <a href="#">Team LMAO 3D</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  
  <!-- JavaScript Libraries -->
  <script src="<?php echo e(URL::asset('Content/lib/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('Content/lib/bootstrap/js/bootstrap.min.js')); ?>"></script>
  <?php echo $__env->yieldContent('js'); ?>
  <script src="<?php echo e(URL::asset('Content/lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('Content/lib/venobox/venobox.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('Content/lib/knob/jquery.knob.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('Content/lib/wow/wow.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('Content/lib/parallax/parallax.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('Content/lib/easing/easing.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('Content/lib/nivo-slider/js/jquery.nivo.slider.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(URL::asset('Content/lib/appear/jquery.appear.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('Content/lib/isotope/isotope.pkgd.min.js')); ?>"></script>

  <!-- Contact Form JavaScript File -->
  <script src="<?php echo e(URL::asset('Content/contactform/contactform.js')); ?>"></script>

  <script src="<?php echo e(URL::asset('Content/js/main.js')); ?>"></script>

<?php $__env->startSection('js'); ?>
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('js-create'); ?>
<?php echo $__env->yieldSection(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\lmao3d\resources\views/layouts\LandingLayout.blade.php ENDPATH**/ ?>