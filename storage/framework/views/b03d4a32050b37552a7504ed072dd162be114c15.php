<ul class="list-group">
                <a href="<?php echo e(route('thread.index')); ?>" class="list-group-item"> All Discussions</a>
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <a href="<?php echo e(route('thread.index',['tags'=>$tag->id])); ?>" class="list-group-item">
                      <span class="badge"><?php echo e(count($tag->threads)); ?></span>
                      <?php echo e($tag->name); ?>

                  </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </a>
            </ul><?php /**PATH C:\xampp\htdocs\lmao3d\resources\views/thread/partials/catogries.blade.php ENDPATH**/ ?>