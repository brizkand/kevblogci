<?php 
    class Post extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();
            //$this->load->model('posts_model');
            $this->load->database();
        }
        public function index($offset = 0)
        {
            $data['title'] = 'Blogs';
            //COUNT THE POST
            $number_of_posts = $this->posts_model->count_post();
            //THIS IS FOR PAGINATION CONFIG
            $config['base_url'] = base_url('post/index/');
            $config['total_rows'] = $number_of_posts;
            $config['per_page'] = 1;
            $config['uri_segment'] = 3;
            // Produces: class="myclass"
            $config['attributes'] = array('class' => 'pagination');
            
            //INITIALIZE THE PAGINATION CONFIG
            $this->pagination->initialize($config);
            
            $data['posts'] = $this->posts_model->get_posts(FALSE, $config['per_page'], $offset);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('posts/blogs', $data);
            $this->load->view('templates/footer');
            
        }
        public function view($slug = NULL)
        {
            $data['title'] = 'Blog Item';
            $data['post_item'] = $this->posts_model->get_posts($slug);
            $data['comments'] = $this->comment_model->get_comment($data['post_item']['id']);
            if(empty($data['post_item']))
            {
                show_404();
            }
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('posts/blog_item', $data);
            $this->load->view('templates/footer');
        }
        public function create(){
            //CHECKED IF LOGGEDIN
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }

            $data['title'] = 'Create Post';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            $data['categories'] = $this->posts_model->get_categories();

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation');
                $this->load->view('posts/create_post', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                //THIS IS FOR UPLOADING IMAGE
                $config['upload_path'] = './public/images/post_images';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 3024;
                $config['max_width'] = 3024;
                $config['max_height'] = 3024;

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('userfile'))
                {
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'no_image.png';
                    
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                }


                $this->posts_model->create_post($post_image);
                $this->session->set_flashdata('post_created', 'You successfully created a post');
                redirect('post');
            }  
        }
        public function delete($slug){
            //CHECKED IF LOGGEDIN
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }
            $this->posts_model->delete_post($slug);
            $this->session->set_flashdata('post_deleted', 'You successfully deleted a post');
            redirect('post');
        }
        public function edit($slug)
        {
            //CHECKED IF LOGGEDIN
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }
            $data['title'] = 'Edit Post';
            $data['post_item'] = $this->posts_model->get_posts($slug);
            if($this->session->userdata('user_id') != $this->posts_model->get_posts($slug)['user_id']){
                redirect('post');
            }
            $data['categories'] = $this->posts_model->get_categories();
            if(empty($data['post_item']))
            {
                show_404();
            }
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('posts/edit_post', $data);
            $this->load->view('templates/footer');
        }
        public function update()
        {
            //CHECKED IF LOGGEDIN
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === FALSE)
            {   
                $data['post_item'] = $this->posts_model->get_posts($slug);
                $data['title'] = 'Edit Post';
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
                $this->load->view('posts/edit_post', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $this->posts_model->update_post();
                $this->session->set_flashdata('post_updated', 'You successfully updated a post');
                redirect('post');
            }
        }
    }
?>
