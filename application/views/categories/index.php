<h1 class='h1-responsive font-weight-bold text-center my-5 wow animated bounceInUp'><?= $title;?></h1>

<div class = 'row mb-2 p-3 wow animated zoomIn slow'>
<?php foreach($categories as $category):?>    
    <div class='col-md-4 p-4'>
        <h2 class='text-info'>
            <a href="<?= site_url('category/posts/' . $category['id']);?>"><?= $category['category']?></a>
            <?php if($this->session->userdata('user_id') === $category['user_id']):?>
                <?php echo form_open('category/delete/' . $category['id']);?>
                    <button class='btn btn-danger btn-sm p-2 m-4'>X</button>
                <?php echo form_close();?>
            <?php endif;?>
        </h2>    
    </div>    
<?php endforeach?>
</div>