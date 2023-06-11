

<?php $__env->startSection('styles'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">Projects <a class="btn" href="<?php echo e(route('projects.create')); ?>"><i class="fa fa-plus"></i> Create Project</a></div>
                    </div>
                </div>

                <div class="card-body">
                    <?php if( $projects->count() > 0 ): ?>
                        <ul class="list-group tasks" id="sortable">
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col"><?php echo e($project->name); ?></div>
                                        <div class="col-auto">
                                            <a class="btn btn-info text-white" href="<?php echo e(route('projects.edit', ['id' => $project->id])); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                        </div>
                                        <div class="col-auto">
                                            <form action="<?php echo e(route('projects.destroy', ['id' => $project->id])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php else: ?>
                        <p>There is no projects yet, <a href="<?php echo e(route('projects.create')); ?>">Create the first one.</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\xampp\htdocs\task-management\resources\views/projects/index.blade.php ENDPATH**/ ?>