<html>
<div class="row page-content">
  <div class="col-lg-12">
    <h2>Register Form</h2>
    <?php if (validation_errors()) {?>
      <div class="alert alert-danger">
        <?php echo validation_errors(); ?>
      </div>
    <?php }?>
    <?php echo form_open('users/actionregister'); ?>

      <div class="form-group">
         <input type="text" name="name" class="form-control" id="name" placeholder="Name">
      </div>
      <div class="form-group">
         <input type="text" name="username" class="form-control" id="username" placeholder="User Name">
      </div>
      <div class="form-group">
         <input type="text" name="email" class="form-control" id="email" placeholder="Email">
      </div>
      <div class="form-group">
         <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      </div>
      <div class="form-group">
         <input type="password" name="confirm_password" class="form-control" id="confirm-password" placeholder="Confirm Password">
      </div>
      <div class="form-group pull-right">
         <button type="submit" id="register" class="btn btn-primary">Register</button>
      </div>
    </div>
    <?php echo form_close(); ?>

</div>
</html>
