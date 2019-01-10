<h1 class='h1-responsive font-weight-bold text-center my-5 wow animated bounceInUp'><?= $title;?></h1>
<b class='text-danger'><?php echo validation_errors(); ?></b>
<div class='row mb-2 p-3 wow animated zoomIn slow justify-content-center'>
    <div class='col-md-4'>
        <?php echo form_open('users/login');?>
            <!-- Username -->
            <div class="md-form">
                    <input type="text" name='username' class="form-control" required>
                    <label>Username</label>
            </div>
            <!-- Password -->
            <div class="md-form">
                <input type="password" name='password' class="form-control" required>
                <label>Password</label>
            </div>
            <button class="btn btn-primary btn-rounded  my-4 " type="submit">Sign in</button>
        <?php echo form_close();?>
    </div>
</div>
