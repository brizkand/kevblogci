<h1 class='h1-responsive font-weight-bold text-center my-5 wow animated bounceInUp'><?= $title;?></h1>
<?php echo validation_errors();?>
<?php echo form_open_multipart('category/create');?>
    <div class='md-form'>        
        <input type="text" name='category' class="form-control">
        <label for="">Category name</label>
    </div>
    <button class="btn btn-primary btn-rounded  my-4 " type="submit">Create Category</button>
</form> 