<?php
    class Comments extends CI_Controller
    {
        public function create($post_id)
        {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('comment', 'Comment', 'required');

            $data['title'] = 'Blog Item';
            $data['post_item'] = $this->posts_model->get_posts($this->input->post('slug'));
            $data['comments'] = $this->comment_model->get_comment($post_id);

            if($this->form_validation->run() === FALSE)
            {   
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation');
                $this->load->view('posts/blog_item', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $this->comment_model->create_comment($post_id);
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation');
                $this->load->view('posts/blog_item', $data);
                $this->load->view('templates/footer');
            }
        }        
    }