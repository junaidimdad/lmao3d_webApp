


  <?php $__env->startSection('header'); ?>

    <?php echo $__env->make('thread.partials.navForum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('all-title-box'); ?>

    <?php echo $__env->make('thread.partials.headerPageArea', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
  <?php $__env->stopSection(); ?>

<?php $__env->startSection('single-thread-content'); ?>
<div class="container">
  <div class="row">
      <div class="col-md-3">
          <h6><span class="fa fa-list-alt"></span> Catogries</h6>
      </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <?php echo $__env->make('thread.partials.catogries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  <div class="col-md-9">
    <div class="row">
      <div class="content-wrap well">
          <h4><?php echo e($thread->subject); ?></h4>
          <div class="thread-details">
            <?php echo \Michelf\Markdown::defaultTransform($thread->thread); ?>

          </div><br>
         
          <?php if(auth()->user()->id == $thread->client_id): ?>
          <div class="actions">

              <a href="<?php echo e(route('thread.edit',$thread->id)); ?>" class="btn btn-xs"><span class="fa fa-edit" style="color:blue;"></span></a>

              
              <form action="<?php echo e(route('thread.destroy',$thread->id)); ?>" method="POST" class="inline-it">
                  <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                  <button class="btn btn-xs" type="submit"><span class="fa fa-trash"  style="color:red;"></span></button>
              </form>
          </div>
          <br>
          <?php endif; ?>
          <a class="btn btn-xs" data-toggle="modal" href="#<?php echo e($thread->id); ?>"><b><span class="fa fa-comment"></span> Comment</b></a>
          <div class="modal fade" id="<?php echo e($thread->id); ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title text-center"><span class="fa fa-comment"></span> Comment</h4>
                </div>
                <div class="modal-body">
                  <div class="comment-form">
                    <form action="<?php echo e(route('threadcomment.store',$thread->id)); ?>" method="post" role="form">
                      <?php echo e(csrf_field()); ?>


                      <div class="form-group">
                        <textarea type="text" class="form-control" name="body" id=""
                        placeholder="Comment..." rows="5" cols="5" style="resize:none;"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" style="margin-left:93%"><span class="fa fa-paper-plane"></span></button>
                    </form>
                  </div>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal --> 
      </div>
      <hr>
      <br>   
          <?php $__currentLoopData = $thread->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="comment-list well well-lg">
              <lead><span class="fa fa-user"></span> <?php echo e($comment->user()->name?? 'Anonymous'); ?></lead><span style="margin-left:72%;"><?php echo e($comment->created_at->diffForHumans()); ?></span>
              <hr>
              <h6><?php echo e($comment->body); ?></h6>
              <?php if(!empty($thread->solution)): ?>
                <?php if($thread->solution==$comment->id): ?>
                  <button class="btn btn-success pull-down pull-right" style="border-radius:50px;">Solution</button>
                <?php endif; ?>
              <?php else: ?>
              <?php if(auth()->check()): ?>
                <?php if(auth()->user()->id==$thread->client_id): ?>
                  <div  class="btn pull-right" onclick="markAsSolution('<?php echo e($thread->id); ?>','<?php echo e($comment->id); ?>',this)" style="border-radius:50px; border:1px solid black;">solution</div>
                <?php endif; ?>
              <?php endif; ?>
              <?php endif; ?>
              <?php if(auth()->user()->id == $comment->client_id): ?>
              <div class="actions">    
                <button class="btn btn-xs" onclick="likeIt('<?php echo e($comment->id); ?>', this)"><span class="fa fa-heart"></span></button>
                <a class="btn btn-xs" data-toggle="modal" href="#<?php echo e($comment->id); ?>" style="color:blue;"><span class="fa fa-edit"></span></a>
                <div class="modal fade" id="<?php echo e($comment->id); ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                </button>
                                <h4 class="modal-title text-center"><span class="fa fa-edit"></span></h4>
                            </div>
                            <div class="modal-body">
                                <div class="comment-form">
                                    <form action="<?php echo e(route('comment.update',$comment->id)); ?>" method="post" role="form">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('put')); ?>

                                        <div class="form-group">
                                            <textarea type="text" class="form-control" name="body" id=""
                                            rows="5" cols="5" style="resize:none;"><?php echo e($comment->body); ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="margin-left:93%;"><span class="fa fa-paper-plane"></span></button>
                                    </form>
                                  </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                
                <form action="<?php echo e(route('comment.destroy',$comment->id)); ?>" method="POST" class="inline-it">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <button class="btn btn-xs" type="submit" style="color:red;"><span class="fa fa-trash"></span></button>
                </form>
              </div>
              <hr>
              <?php endif; ?>

       
              <a class="btn btn-xs" onclick="toggleReply('<?php echo e($comment->id); ?>')"><span class="fa fa-reply"></span> Reply</a><br>
              <div class="reply-form-<?php echo e($comment->id); ?> hidden">
                <form action="<?php echo e(route('replycomment.store',$comment->id)); ?>" method="post" role="form">
                  <?php echo e(csrf_field()); ?>


                  <div class="form-group">
                    <textarea type="text" class="form-control" name="body" id=""
                    placeholder="Reply..." rows="5" cols="5" style="resize:none;"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary" style="margin-left:95%"><span class="fa fa-paper-plane"></span></button>
                </form>
              </div>
            </div>

            <?php $__currentLoopData = $comment->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="small well text-info" style="margin-left:20px;">
                <lead><span class="fa fa-users"></span> <?php echo e($reply->user->name?? 'Anonymous'); ?></lead><span style="margin-left:70%;"><?php echo e($reply->created_at->diffForHumans()); ?></span>
                <hr>
                <p><?php echo e($reply->body); ?></p>
                <?php if(auth()->user()->id == $reply->client_id): ?>
                <div class="actions">
                  <a class="btn btn-xs" data-toggle="modal" href="#<?php echo e($reply->id); ?>" style="color:black;"><span class="fa fa-edit"></span></a>
                  <div class="modal fade" id="<?php echo e($reply->id); ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                             <h4 class="modal-title text-center"><span class="fa fa-edit"></span></h4>
                        </div>
                        <div class="modal-body">
                          <div class="reply-form">
                            <form action="<?php echo e(route('comment.update',$comment->id)); ?>" method="post" role="form">
                              <?php echo e(csrf_field()); ?>

                              <?php echo e(method_field('put')); ?>

                              <div class="form-group">
                                <textarea type="text" class="form-control" name="body" id=""
                                rows="5" cols="5" style="resize:none;"><?php echo e($reply->body); ?></textarea>
                              </div>
                              <button type="submit" class="btn btn-primary" style="margin-left:93%"><span class="fa fa-paper-plane"></span></button>
                            </form>
                          </div>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->

                  
                  <form action="<?php echo e(route('comment.destroy',$reply->id)); ?>" method="POST" class="inline-it">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                    <button class="btn btn-xs" type="submit" style="color:red;"><span class="fa fa-trash"></span></button>
                  </form>
                </div>
                <?php endif; ?>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <hr>
            <br>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div><br><br>
    </div>
    </div>
  </div>
</div>
<hr>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script>
    function toggleReply(commentId){
      $('.reply-form-'+commentId).toggleClass('hidden');
    }

    function markAsSolution(threadId, solutionId,elem) {
      var csrfToken='<?php echo e(csrf_token()); ?>';
      $.post('<?php echo e(route('markAsSolution')); ?>', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
          $(elem).text('Solution');
      });
    }

    function likeIt(commentId, elem){
      var csrfToken='<?php echo e(csrf_token()); ?>';
      $.post('<?php echo e(route('likeIt')); ?>', {commentId: commentId ,_token:csrfToken}, function (data) {
          console.log(data);
         
      });
    }
  
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts\LandingLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lmao3d\resources\views/thread/single.blade.php ENDPATH**/ ?>