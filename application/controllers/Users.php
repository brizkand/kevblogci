<?php
    class Users extends CI_Controller
    {
        public function register()
        {
            $data['title'] = 'Sign up';
            
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exist');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exist');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('repassword', 'Confirm password', 'matches[password]');

            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation');
                $this->load->view('users/register');
                $this->load->view('templates/footer');
            }
            else
            {
                $enc_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $this->user_model->register($enc_password);
                $this->session->set_flashdata('user_registered', 'You successfully created an account! 
                 You can now login.');
                redirect('users/login');
            }
        }

        public function login()
        {
            $data['title'] = 'Sign in';
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navigation');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }
            else{
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $saved_password = $this->user_model->get_password($username);
                if($saved_password)
                {
                    $password_verify = $this->user_model->password_verify($saved_password,  $password);

                    if($password_verify === TRUE)
                    {
                        $user_id = $this->user_model->login($username, $saved_password);
                        if($user_id)
                        {
                            $userdata = array(
                                'user_id' => $user_id,
                                'username'  => $username,
                                'logged_in' => TRUE
                            );
                            $this->session->set_userdata($userdata);

                            $this->session->set_flashdata('loggedin_success','You are now loggedin!');
                            redirect('post');
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata('loggedin_failed','Your username or password is incorrect!');
                        redirect('users/login');
                    }
                }
                else
                {
                    $this->session->set_flashdata('loggedin_failed','Your username or password is incorrect!');
                    redirect('users/login');
                }
            }
        }

        public function logout()
        {
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('logged_in');

            $this->session->set_flashdata('logout','Your are now logout!');
            redirect('users/login');
        }
        
        public function check_username_exist($username)
        {
            $this->form_validation->set_message('check_username_exist', 'This username is taken! 
            Please choose different one');
            if($this->user_model->check_username_exist($username))
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
            $this->form_validation->set_message('check_email_exist', 'This email is taken! 
            Please choose different one');
            if($this->user_model->check_email_exist($email))
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