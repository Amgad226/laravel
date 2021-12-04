

<?php $__env->startSection('page-title'); ?>
Our Email
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contant'); ?>


<div ><p class="text-white bg-dark">welcome in controle panel</p></div>
<?php if(session('success_delete')): ?>
<div class="alert alert-danger mt-5">
    <h1><?php echo e(session('success_delete')); ?> </h1>
</div>

<?php endif; ?>


            
         
         
<div class="card mt-5" >
 <div class="row">
  <div class="col-lg-12">
    
    <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="w-1 p-3">
<div class="border border-secondary" >
    <div class="card-header "> <h2 class="text-left"><?php echo e($item->username); ?> </h2> 
    <span class="float-right"> <?php echo e($item->updated_at->diffForHumans("s")); ?></span>   </div>

      <div class="card-body">
        <p class="text-left"><span class="font-weight-bold"> id is :</span>   <?php echo e($item->id); ?>   </p>
        <p class="text-left"><span class="font-weight-bold"> name is :</span>   <?php echo e($item->name); ?>   </p>
        <p class="text-left"><span class="font-weight-bold"> password is :</span>   <?php echo e($item->password); ?>   </p>

        

        <a id="joj" href= "<?php echo e(Route('post.destroy',$item->id )); ?>  " class="btn btn-danger">delete this account  </a>
        <script>  
          let hmaro = document.getElementById("joj")
          hmaro.onclick = function(){  alert("You have permanently deleted the account   ");}
      </script>
        <a href= " <?php echo e(Route('post.edit',$item->id )); ?>" class=" btn btn-warning text-dark bg-white">edit this account  </a>
     
      </div>
    </div>
  </div></div>
</div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
</div>




<script>
  function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('hi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/post.blade.php ENDPATH**/ ?>