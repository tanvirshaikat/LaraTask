

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Project</div>

                <div class="card-body">
                    <?php if(count($errors)>0): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('projects.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" value="<?php echo e(old('name')); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-success">Create</button>
                        <a href="<?php echo e(route('projects.index')); ?>" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\task-management\resources\views/projects/create.blade.php ENDPATH**/ ?>