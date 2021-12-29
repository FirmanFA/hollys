<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// me-load library form_validation
		$this->load->library('form_validation');
		$this->load->helper('cookie');
	}

	public function index()
	{
		$userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/index');
		$this->load->view('admin/templates/footer');
		
	}
}
