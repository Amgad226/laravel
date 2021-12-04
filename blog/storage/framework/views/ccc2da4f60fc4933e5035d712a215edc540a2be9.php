


<?php $__env->startSection('page-title'); ?>
 Update info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contant'); ?>
            <div>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

                <?php if(session('update_done')): ?>
                    <div class="alert alert-success mt-5">
                        <h1><?php echo e(session('update_done')); ?> </h1>
                    </div>

                <?php endif; ?>

               

            <form action="<?php echo e(route('post.update' ,$edit-> id)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                        <div>

                       <div class="mb-3">
                           <label  class="form-label">name</label>
                           <input type="text"name = "name" class="form-control" id="name" value="<?php echo e($edit->name); ?>" >
                       </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">username</label>
                        <input type="text "name = "username" class="form-control" id="username" value="<?php echo e($edit->username); ?>">
                        </div>

                        <div class="mb-3">
                        <label  class="form-label">password</label>
                        <input type="text"name = "password" class="form-control" id="password" value="<?php echo e($edit->password); ?>" >
                        
                        </div>

                <input type="submit"name="submit" class="btn btn-success"value="update">
            </form>

            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('hi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/accounte_to_edit.blade.php ENDPATH**/ ?>