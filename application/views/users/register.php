<h1 class='h1-responsive font-weight-bold text-center my-5 wow animated bounceInUp'><?= $title;?></h1>
<b class='text-danger'><?php echo validation_errors(); ?></b>
<div class='row mb-2 p-3 wow animated zoomIn slow justify-content-center'>
    <!-- <div class='col-md-4'></div> -->
    <div class='col-md-4'>
        <?php echo form_open('users/register');?>
            <!-- First name -->
            <div class="md-form">
                <input type="text" name='firstname' class="form-control">
                <label>Firstname</label>
            </div>
            <!-- Last name -->
            <div class="md-form">
                <input type="text" name='lastname' class="form-control">
                <label>Lastname</label>
            </div>
            <!-- Zipcode -->
            <div class="md-form">
                <input type="text" name='zipcode' class="form-control">
                <label>Zipcode</label>
            </div>
            <!-- Email -->
            <div class="md-form">
                <input type="email" name='email' class="form-control">
                <label>Email</label>
            </div>
            <!-- Username -->
            <div class="md-form">
                <input type="text" name='username' class="form-control">
                <label>Username</label>
            </div>
            <!-- Password -->
            <div class="md-form">
                <input type="password" name='password' class="form-control">
                <label>Password</label>
            </div>
            <!-- Re Password -->
            <div class="md-form">
                <input type="password" name='repassword' class="form-control">
                <label>Repassword</label>
            </div>
            <!-- Create button -->
            <button class="btn btn-primary btn-rounded  my-4 " type="submit">Sign up</button>
        </form>
    </div>
</div>