<?php

class Users extends CI_Controller
{
    public function index() {
        $data['users'] = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
        $data['title'] = 'Home Page';
		$this->load->view('templates/header_user', $data);
		$this->load->view('foodpageUser/index');
		$this->load->view('templates/footer');
    }
}