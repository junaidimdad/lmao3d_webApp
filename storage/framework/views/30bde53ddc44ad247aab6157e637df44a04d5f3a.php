

  
  <?php $__env->startSection('header'); ?>

    <?php echo $__env->make('thread.partials.navForum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('all-title-box'); ?>

    <?php echo $__env->make('thread.partials.headerPageArea', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php $__env->stopSection(); ?>



<?php $__env->startSection('threads'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h6><span class="fa fa-list-alt"></span> Catogries</h6>
        </div>
        <div class="col-md-9">
            <div class="row">
            <div class="col-md-4"><h6 class="main-content-heading"><span class='fa fa-comments-o'></span> All Discussions</h6></div>
            <div class="col-md-offset-6 col-md-2">
                <a href="<?php echo e(route('thread.create')); ?>" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Start Discussion</a>
            </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('thread.partials.catogries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
        <div class="list-group">
        <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <a href="<?php echo e(route('client_profile',$thread->user->name)); ?>">
                    <img src="/clients/avatars/<?php echo e($thread->user->avatar); ?>" style="width:32px; height:32px;  top:17px; left:10px;  border-radius:50%"> <span></span>
                </a><span class="pull-right" style="font-size:12px;"><?php echo e($thread->created_at->diffForHumans()); ?></span>
            </div>
            <div class="panel-body">
                <h3 class="panel-title"><a href="<?php echo e(route('thread.show',$thread->subject)); ?>"><b><?php echo e($thread->subject); ?></b></a></h3>
                <hr>
                <p>
                    <?php echo e(\Illuminate\Support\Str::limit($thread->thread,100)); ?>

                </p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts\LandingLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lmao3d\resources\views/thread/index.blade.php ENDPATH**/ ?>