<?php
    class Posts_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE)
            {
            if($limit)
            {
                $this->db->limit($limit, $offset);
            }
            if($slug === FALSE){
                $this->db->order_by('posts.id', 'DESC');
                $this->db->join('categories', 'categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            //$this->db->select('*');
            //$this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post($post_image)
        {
            $slug = url_title($this->input->post('title'), 'dash', TRUE);
            $data = array(
                'title' => $this->input->post('title'),
                'user_id' => $this->session->userdata('user_id'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category'),
                'post_image' => $post_image
            );
            return $this->db->insert('posts', $data);
        }

        public function delete_post($slug)
        {   
            $this->db->where('slug', $slug);
            return $this->db->delete('posts');
        }

        public function update_post(/*$slug*/)
        {
            $id = $this->input->post('slug');
            $slug = url_title($this->input->post('title'), 'dash', TRUE);
            $data = array(
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'slug' => $slug,
                'category_id' => $this->input->post('category')
            );
            $this->db->where('slug', $id);
            return $this->db->update('posts', $data);
        }
        
        public function get_categories()
        {
            $query = $this->db->get('categories');
            return $query->result_array();
        }
        public function get_posts_by_category_id($id)
        {   
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get_where('posts', array('category_id' => $id));
            return $query->result_array();
        }

        //COUNT THE TOTAL POSTS
        public function count_post()
        {
            $query = $this->db->count_all('posts');
            return $query;
        }
    }    
?>