<?php
    class Category extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            //$this->load->model('category_model');
            //$this->load->model('posts_model');
        }

        public function index()
        {
            $data['title'] = "Categories";
            $data['categories'] = $this->category_model->get_categories();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function create()
        {
            //CHECKED IF LOGGEDIN
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }
            $data['title'] = "Create Category";
            $this->form_validation->set_rules('category', 'Category', 'required');

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation');
                $this->load->view('categories/create_category', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $this->category_model->create_category();
                $this->session->set_flashdata('category_created', 'You successfully created a new category');
                redirect('category');
            }
        }
        public function posts($id)
        {
            $data['title'] = $this->category_model->get_category($id)->category;
            $data['posts'] = $this->posts_model->get_posts_by_category_id($id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation');
            $this->load->view('posts/blogs', $data);
            $this->load->view('templates/footer');
        }
        //FOR DELETING CATEGORY
        public function delete($id)
        {
            //CHECKED IF LOGGEDIN
            if(!$this->session->userdata('logged_in'))
            {
                redirect('users/login');
            }
            $this->category_model->delete_category($id);
            $this->session->set_flashdata('category_deleted', 'You successfully deleted a category');
            redirect('category/index');
        }
    }
?>