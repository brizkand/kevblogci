<?php
    class Calen_con extends CI_Controller
    {
        public function test()
        {
            $prefs = array(
                'show_next_prev'  => TRUE,
                'next_prev_url'   => 'http://localhost/my_first_code_igniter_project/calen_con/test'
            );
            
            $this->load->library('calendar', $prefs);
            
            echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
        }
    } 
?>