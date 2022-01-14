<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="http://127.0.0.1:8000/sharks">shark Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="http://127.0.0.1:8001/sharks">View All sharks</a></li>
        <li><a href="http://127.0.0.1:8001/sharks/create">Create a shark</a>
    </ul>
</nav>

<h1>All the sharks</h1>

<!-- will be used to show any messages -->

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>shark Level</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $sharks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($value->id); ?></td>
            <td><?php echo e($value->name); ?></td>
            <td><?php echo e($value->email); ?></td>
            <td><?php echo e($value->shark_level); ?></td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the shark (uses the show method found at GET /sharks/{id} -->
                <a class="btn btn-small btn-success" href="<?php echo e(URL::to('sharks/' . $value->id)); ?>">Show this shark</a>

                <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                <a class="btn btn-small btn-info" href="<?php echo e(URL::to('sharks/' . $value->id . '/edit')); ?>">Edit this shark</a>
                <?php echo e(Form::open(array('url' => 'sharks/' . $value->id, 'class' => 'pull-right'))); ?>

                    <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                    <?php echo e(Form::submit('Delete this shark', array('class' => 'btn btn-warning'))); ?>

                <?php echo e(Form::close()); ?>




            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

</div>
</body>
</html>

<?php /**PATH /home/steve/sharks/resources/views/sharks/index.blade.php ENDPATH**/ ?>