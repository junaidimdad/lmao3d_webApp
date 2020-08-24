

  
 <?php $__env->startSection('header'); ?>
  <!-- header-area start -->
  <div id="sticker" class="header-area">
      <div class="container">
      <div class="row">
          <div class="col-md-12 col-sm-12">

          <!-- Navigation -->
          <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                      <span class="sr-only">Toggle navigation</span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                  </button>
              <!-- Brand -->
              <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>L</span>MAO 3D</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                              </a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
              <ul class="nav navbar-nav navbar-right">
                  <li>
                  <a class="page-scroll" href="<?php echo e(route('welcome')); ?>">Home</a>
                  </li>
                  <li class="active">
                  <a class="page-scroll" href="">Forum</a>
                  </li>
                  <li>
                  <a class="page-scroll" href="<?php echo e(route('client.login')); ?>">SignIn</a>
                  </li>
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Logout<span class="caret"></span></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                      </li>
                    </ul> 
                  </li>
              </ul>
              </div>
              <!-- navbar-collapse -->
          </nav>
          <!-- END: Navigation -->
          </div>
      </div>
      </div>
  </div>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('all-title-box'); ?>
   <!-- Start Bottom Header -->
   <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Profile</h1>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3">Profesional Discussion Forum</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><br><br>
  <!-- END Header -->
  <?php $__env->stopSection(); ?>

<?php $__env->startSection('category-client'); ?>


   <div class="col-md-4" >
      <div style="height:200px; width:200px; margin-left:27%;" >
        <img src="/clients/avatars/<?php echo e($user->avatar); ?>" style="width:150px; height:150px; float:left; border-radius:50%; margin-right: 25px;" >
        <div>
          <h6><?php echo e($user->name); ?></h6>
        </div>
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-client-thread'); ?>
<div class="container">
    <div class="col-md-8">
        
        <p><?php echo e($user->name); ?>'s latest Threads</p>

        <?php $__empty_1 = true; $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <h5><?php echo e($thread->subject); ?></h5>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h5>No threads yet</h5>

        <?php endif; ?>
        <br>
        <hr>

        <h6><?php echo e($user->name); ?>'s latest Comments</h6>

        <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <p><?php echo e($user->name); ?> commented on <a href="<?php echo e(route('thread.show',$comment->commentable->id)); ?>"><?php echo e($comment->commentable->subject); ?></a>  <?php echo e($comment->created_at->diffForHumans()); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h5>No comments yet</h5>
        <?php endif; ?>
    </div>
</div>
<hr>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\LandingLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lmao3d\resources\views/profile/index.blade.php ENDPATH**/ ?>