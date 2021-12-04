


<?php $__env->startSection('page-title'); ?>
  login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contant'); ?>
<form action="<?php echo e(Route('post.database')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

            <div>
                    
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('hi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/login_to_admin_panal.blade.php ENDPATH**/ ?>