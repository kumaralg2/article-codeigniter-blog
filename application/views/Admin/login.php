<?php include('header.php')?>
<body>
    <div class="container">
    <h1>Admin Login</h1>
    <?php echo form_open('Admin/index');?>
    <fieldset>  
    <div class="row">
        <div class="col-lg-6">
        <div class="form-group">
            <label for="Username">Username:</label>
            <?php echo form_input(['class'=>'form-control', 'placeholder'=>'Enter Username','name'=>'username','value'=>set_value('simple')]);?>
        </div>
        </div>
        <?php echo form_error('username'); ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <div class="form-group">
        <label for="password">Password</label>
        <?php echo form_password(['class'=>'form-control', 'placeholder'=>'Enter Password','type'=>'password','name'=>'password','value'=>set_value('password')]);?>    
        </div>
        </div>
        <?php echo form_error('password'); ?>
    </div>
    </fieldset>
    <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']);?>
    <?php echo form_reset(['type'=>'reset','class'=>'btn btn-danger','value'=>'Reset']);?>

  </fieldset>
</div>

<?php include('footer.php')?>
