

  <?php $__env->startSection('header'); ?>
 
    <?php echo $__env->make('thread.partials.navForum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('all-title-box'); ?>

    <?php echo $__env->make('thread.partials.headerPageArea', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php $__env->stopSection(); ?>

<?php $__env->startSection('thread-form-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h6><span class="fa fa-list-alt"></span> Catogries</h6>
        </div>
        <div class="col-md-9">
            <div class="row">
            <div class="col-md-4"><h6 class="main-content-heading"><span class="fa fa-plus"></span> Create New Discussion</h6></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('thread.partials.catogries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
        <div class="row">
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session('message')); ?>

            </div>
        <?php endif; ?>
        <div class=" well">
            <form class="form-vertical" action="<?php echo e(url('thread')); ?>" method="POST" role="form"
                  id="create-thread-form">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label for="tag">Tags</label>
                    <select name="tags[]" multiple id="tag" >
                        
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="" placeholder="Subject..."
                           value="<?php echo e(old('subject')); ?>">
                </div>

                <div class="form-group">
                    <label for="thread">Thread</label>
                    <textarea class="form-control" name="thread" id="" rows="7" cols="7" style="resize:none;" placeholder="Discussion..."
                    > <?php echo e(old('thread')); ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-create'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>

    <script>

        $(function () {
            $('#tag').selectize();
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\LandingLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lmao3d\resources\views/thread/create.blade.php ENDPATH**/ ?>