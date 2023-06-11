

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
                        <div class="col">Tasks</div>
                        <div class="col-auto">
                            <select class="form-control" name="projects">
                                <option value="">All Projects</option>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($project->id); ?>"><?php echo e($project->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <?php if( $tasks->count() > 0 ): ?>
                        <ul class="list-group tasks" id="sortable">
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item" data-task-id="<?php echo e($task->id); ?>" data-project-id="<?php echo e($task->project ? $task->project->id : ''); ?>">
                                    <div class="row">
                                        <div class="col"><?php echo e($task->name); ?></div>
                                        <div class="col-auto"><?php echo e($task->project ? $task->project->name : ''); ?></div>
                                        <div class="col-auto"><a class="btn btn-info text-white" href="<?php echo e(route('tasks.edit', ['id' => $task->id])); ?>">Edit</a></div>
                                        <div class="col-auto">
                                            <form action="<?php echo e(route('tasks.destroy', ['id' => $task->id])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php else: ?>
                        <p>There is no tasks yet, <a href="<?php echo e(route('tasks.create')); ?>">Create the first one.</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $("#sortable").sortable({
            stop: function( event, ui ) {
                var $e        = $(ui.item);
                var $prevItem = $e.prev();
                var $nextItem = $e.next();

                $.ajax({
                    url: "<?php echo e(route('tasks.setPriority')); ?>",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        task_id: $e.data('task-id'),
                        prev_id: $prevItem ? $prevItem.data('task-id') : null,
                        next_id: $nextItem ? $nextItem.data('task-id') : null
                    } 
                });
            }
        });

        $('[name="projects"]').on('change', function(){
            var $this = $(this);
            
            if( $this.val() ){
                $('.tasks li').hide();

                $('.tasks li')
                    .filter( $(`[data-project-id="${$this.val()}"]`) )
                    .show();

                return;
            }

            $('.tasks li').show();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\newxampp\htdocs\task-management\resources\views/tasks/index.blade.php ENDPATH**/ ?>