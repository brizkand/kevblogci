<h1 class='h1-responsive font-weight-bold text-center my-5 wow animated bounceInUp'><?= $title;?></h1>

<div class='wow animated zoomIn slow'>
    <div class='row'>
        <div class='col-md-6'>
            <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                <img class="img-fluid" src="<?= base_url('public/images/post_images/' . $post_item['post_image']);?>" alt="<?= $post_item['post_image'];?>">
            </div>
        </div>
        <div class='col-md-6'>
            <h2><?= $post_item['title'];?></h2>
            <p><?= $post_item['body'];?></p>
            <p><small><?= $post_item['created_at'];?></small></p>
            <?php if($this->session->userdata('user_id') === $post_item['user_id']):?>
                <a class='btn btn-warning float-left' href="<?= site_url('post/edit/' . $post_item['slug']);?>">Edit</a>
                <?php echo form_open('post/delete');?>
                <a class='btn btn-danger float-left' href="<?php echo base_url('post/delete/' . $post_item['slug']);?>">Delete</a>
            <?php endif; ?>
            </form>
                <a class='btn btn-default float-right' href="<?= site_url('post');?>">Go back</a>
            <br><br><br><br>
        </div>
    </div>
</div>

<div class='wow animated zoomIn slow'>
    <b class='text-danger'><?php echo validation_errors(); ?></b>
    <h2>Add comment</h2>
    <?php echo form_open('comments/create/' . $post_item['id']);?>
        <input type="hidden" name='slug' value='<?php echo $post_item["slug"];?>'>
        <!-- Comment Name -->
        <div class="md-form">
            <input type="text" name='name' class="form-control">
            <label>Your name</label>
        </div>
        <!-- Comment email -->
        <div class="md-form">
            <input type="email" name='email' class="form-control">
            <label>Your email</label>
        </div>

        <!--Comment -->
        <div class="md-form">
            <input  type="text" name='comment' class="form-control">
            <label>Your comment</label>
        </div>
        <!-- Create button -->
        <button class="btn btn-primary btn-rounded  my-4 " type="submit">Submit</button>
    </form>
</div>

<div class='wow animated zoomIn slow'>
    <h2>Comments</h2>
    <?php if($comments):?>
        <?php foreach($comments as $comment):?>
            <p><?php echo $comment['comment'];?></p>
            <p><strong>By: </strong><?php echo $comment['name'];?></p>
            <p><small><?php echo $comment['created_at'];?></small></p><hr>
        <?php endforeach;?>
        
    <?php else:?>
        <p>No comments to display</p>
    <?php endif;?>
</div>