<!--Main Navigation-->
<header class="stickyTop">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark peach-gradient scrolling-navbar">

        <!-- Navbar brand -->
        <a class="navbar-brand animated flip slower infinite" href="#">K.H.C.I.
            <!-- <img class="circle" src="public/logo/genserv-logo.png" alt="Genserv Logo" style="width:40px;"> -->
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if($title == 'Home'){echo 'active';}?>">
                    <a class="nav-link" href="<?= base_url('home');?>">Home
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?php if($title == 'About'){echo 'active';}?>">
                    <a class="nav-link" href="<?= base_url('about');?>">About
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?php if($title == 'Blogs'){echo 'active';}?>">
                    <a class="nav-link" href="<?= base_url('post');?>">Blogs
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item <?php if($title == 'Categories'){echo 'active';}?>">
                    <a class="nav-link" href="<?= base_url('category');?>">Categories
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
            <ul class='navbar-nav ml-auto'>
                <?php if(!$this->session->userdata('logged_in')):?>
                    <li class='nav-item <?php if($title == 'Sign up'){echo 'active';}?>'>
                        <a class='nav-link' href="<?= base_url('users/register')?>">Register
                        <span class="sr-only">(current)</span>    
                        </a>
                    </li>
                    <li class='nav-item <?php if($title == 'Sign in'){echo 'active';}?>'>
                        <a class='nav-link' href="<?= base_url('users/login')?>">Sign in
                        <span class="sr-only">(current)</span>    
                        </a>
                    </li>
                <?php endif;?>
                <?php if($this->session->userdata('logged_in')):?>
                    <li class='nav-item <?php if($title == 'Create Post'){echo 'active';}?>'>
                        <a class='nav-link' href="<?= base_url('post/create')?>">Create Post
                        <span class="sr-only">(current)</span>    
                        </a>
                    </li>
                    <li class='nav-item <?php if($title == 'Create Category'){echo 'active';}?>'>
                        <a class='nav-link' href="<?= base_url('category/create')?>">Create Category
                        <span class="sr-only">(current)</span>    
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href="<?= base_url('users/logout')?>">Logout
                        <span class="sr-only">(current)</span>    
                        </a>
                    </li>
                <?php endif;?>
            </ul>
            <!-- Links -->
        </div>
        <!-- Collapsible content -->
    </nav>
    <!--/.Navbar-->
</header>
<div class="container-fluid">
    <div class='my-2'>
        <?php if($this->session->flashdata('user_registered')):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong class='text-success'><?php echo $this->session->flashdata('user_registered');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata('post_created')):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong class='text-success'><?php echo $this->session->flashdata('post_created');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata('post_updated')):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong class='text-success'><?php echo $this->session->flashdata('post_updated');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata('post_deleted')):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong class='text-success'><?php echo $this->session->flashdata('post_deleted');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata('category_created')):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong class='text-success'><?php echo $this->session->flashdata('category_created');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata('loggedin_failed')):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong class='text-danger'><?php echo $this->session->flashdata('loggedin_failed');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata('loggedin_success')):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong class='text-success'><?php echo $this->session->flashdata('loggedin_success');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata('logout')):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong class='text-success'><?php echo $this->session->flashdata('logout');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>

        <?php if($this->session->flashdata('category_deleted')):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong class='text-success'><?php echo $this->session->flashdata('category_deleted');?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif;?>
    </div>

    