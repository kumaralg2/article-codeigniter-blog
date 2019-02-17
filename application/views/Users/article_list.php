<?php include('header.php')?>
<body>
    <div class="container">
    <h1>Admin Login</h1>
    <?php echo form_open('Admin/index');?>
    <fieldset>  
    <div class="form-group">
      <label for="Username">Username:</label>
      <?php echo form_input(['class'=>'form-control', 'placeholder'=>'Enter Username']);?>

    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <?php echo form_password(['class'=>'form-control', 'placeholder'=>'Enter Password','type'=>'password']);?>    
    </div>
    
    </fieldset>
    <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']);?>
    <?php echo form_reset(['type'=>'reset','class'=>'btn btn-danger','value'=>'Reset']);?>

  </fieldset>
</div>
<?php include('footer.php')?>
