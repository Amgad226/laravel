<?php $__env->startSection('page-title'); ?>
  login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contant'); ?>
            <div>
                <div ><p class="text-white bg-dark">sing up in our website</p></div>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

                <?php if(session('okay')): ?>
                    <div class="alert alert-success mt-5">
                        <h1><?php echo e(session('okay')); ?> </h1>
                    </div>

                <?php endif; ?>

               

            <form action="<?php echo e(Route('post.store')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                        <div>

                        <div class="mb-3">
                            <label  class="form-label">name</label>
                            <input type="text"name = "name" class="form-control" id="name">
                        </div>
                                
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">username</label>
                        <input type="text "name = "username" class="form-control" id="username" >
                        </div>

                        <div class="mb-3">
                        <label  class="form-label">password</label>
                        <input type="password"name = "password" class="form-control" id="password">
                        
                        

                        </div>
                        

                <input type="submit"name="submit" class="btn btn-primary"value="Submit">
            </form>

            </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('hi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/login_account.blade.php ENDPATH**/ ?>