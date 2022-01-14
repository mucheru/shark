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
        <li><a href="<?php echo e(URL::to('sharks')); ?>">View All sharks</a></li>
        <li><a href="<?php echo e(URL::to('sharks/create')); ?>">Create a shark</a>
    </ul>
</nav>

<h1>Create a shark</h1>

<!-- if there are creation errors, they will show here -->
<?php echo e(Html::ul($errors->all())); ?>


<?php echo e(Form::open(array('url' => 'sharks'))); ?>


    <div class="form-group">
        <?php echo e(Form::label('name', 'Name')); ?>

        <?php echo e(Form::text('name', Input::old('name'), array('class' => 'form-control'))); ?>

    </div>

    <div class="form-group">
        <?php echo e(Form::label('email', 'Email')); ?>

        <?php echo e(Form::email('email', Input::old('email'), array('class' => 'form-control'))); ?>

    </div>

    <div class="form-group">
        <?php echo e(Form::label('shark_level', 'shark Level')); ?>

        <?php echo e(Form::select('shark_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('shark_level'), array('class' => 'form-control'))); ?>

    </div>

    <?php echo e(Form::submit('Create the shark!', array('class' => 'btn btn-primary'))); ?>


<?php echo e(Form::close()); ?>


</div>
</body>
</html>
 <?php /**PATH /home/steve/sharks/resources/views/sharks/create.blade.php ENDPATH**/ ?>