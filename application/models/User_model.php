<?php
    class User_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function register($enc_password)
        {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'zipcode' => $this->input->post('zipcode'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password
            );
            $this->db->insert('users', $data);
        }

        public function login($username, $password)
        {
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $result = $this->db->get('users');
            if($result->num_rows() == 1)
            {
                return $result->row(0)->id;
            }
            else
            {
                return FALSE;
            }
        }

        //GET PASSWORD BY ITS USERNAME
        public function get_password($username)
        {
            $this->db->where('username', $username);
            $result = $this->db->get('users');
            if($result->num_rows() == 1)
            {
                return $result->row(0)->password;
            }
            else
            {
                return FALSE;
            }
        }

        //PASSWORD VERIFICATION
        public function password_verify($saved_password,  $password)
        {
            return password_verify($password, $saved_password);
        }

        public function check_username_exist($username)
        {
            $query = $this->db->get_where('users', array('username' => $username));
            if(empty($query->row_array()))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }

        public function check_email_exist($email)
        {
            $query = $this->db->get_where('users', array('email' => $email));
            if(empty($query->row_array()))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }
?>