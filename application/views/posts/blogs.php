<h1 class='h1-responsive font-weight-bold text-center my-5 wow animated bounceInUp'><?= $title;?></h1>

<?php foreach($posts as $post): ?>   
    <div class='row mb-2 p-3 wow animated zoomIn slow'>
        <div class='col-sm-4'>
            <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                <img class="img-fluid" src="<?= base_url('public/images/post_images/' . $post['post_image']);?>" alt="<?= $post['post_image'];?>">
            </div>
        </div>
        <div class='col-sm-8'>
            <h2><?= $post['title'];?></h2>
            <h6><?= $post['category'];?></h6>
            <div>
                <p><?= word_limiter($post['body'], 30);?></p>
                <p><small><?= $post['created_at'];?></small></p>
                <a href="<?= site_url('post/'.$post['slug']);?>" class='btn btn-success'>Read More</a>
            </div>
        </div>
    </div>
<?php endforeach ?>

<div>
    <ul class="pagination pg-blue">
        <a href=""><?php echo $this->pagination->create_links();?></a>
    </ul>
</div>