<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Superadmin');
	}

    public function index()
    {
		
        $queryAllAdmin = $this->M_Superadmin->getDataAdmin();
		// test code
        // echo '<pre>';
		// print_r($this->session->userdata());
		// echo '<pre>';

		// Jika bukan superadmin, tidak boleh masuk
		if ($this->session->userdata('role_id') != 3) {
			echo 'Not Authorized';
			redirect(base_url('admin'));

		}
		else {
			$DATA = array('queryAllAdmin' => $queryAllAdmin);

			$userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
			$dataUser = array(
				'username' => $userData['namadepan'].' '.$userData['namabelakang'],
				'image' => $userData['image']
			);

			
			$this->load->view('admin/templates/header', $dataUser);
			$this->load->view('admin/superadmin.php', $DATA);
			$this->load->view('admin/templates/footer');

			
		}

        
    }

    public function addAdmin()
	{
		$userData = $this->db->get_where('users', 
										[ 'email' => $this->session->userdata('email') ] 
					) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/addAdmin.php');
		$this->load->view('admin/templates/footer');
		
	}

	public function addAdminFunc()
	{
		// $id = $this->input->post('id');
		$namadepan = $this->input->post('namadepan');
        $namabelakang = $this->input->post('namabelakang');
		$email = $this->input->post('email');
        $image = $this->input->post('image');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $nohp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');
        $role_id = 1;
        $is_active = 1;
		$created_at = time();

		$arrInsert = array(
			// 'id' => $id, auto increment
			'namadepan' => $namadepan,
            'namabelakang' => $namabelakang,
			'email' => $email,
            'image' => $image,
			'password' => $password,
            'nohp' => $nohp,
            'alamat' => $alamat,
            'role_id' => $role_id,
            'is_active' => $is_active,
			'created_at' => $created_at,
		);

		$this->M_Superadmin->insertDataAdmin($arrInsert);
		redirect(base_url('admin/Superadmin'));

		// echo '<pre>';
		// print_r($arrInsert);
		// echo '</pre>';
	}

	public function updateAdmin($id)
	{
		$queryDetailAdmin = $this->M_Superadmin->getDataDetailAdmin($id);
		// echo '<pre>';
		// print_r($queryDetailAdmin);
		// echo '</pre>';

		$DATA = array('queryDetailAdmin' => $queryDetailAdmin);
		

		$userData = $this->db->get_where('users', 
										[ 'email' => $this->session->userdata('email') ] 
					) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/updateAdmin.php', $DATA);
		$this->load->view('admin/templates/footer');
	}

	

	public function updateAdminFunc()
	{
		$id = $this->input->post('id');
		$namadepan = $this->input->post('namadepan');
        $namabelakang = $this->input->post('namabelakang');
		$email = $this->input->post('email');
        $image = $this->input->post('image');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $nohp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');
        $role_id = 1;
        $is_active = 1;
		$created_at = time();
        
		$arrUpdate = array(
			'namadepan' => $namadepan,
            'namabelakang' => $namabelakang,
			'email' => $email,
            'image' => $image,
			'password' => $password,
            'nohp' => $nohp,
            'alamat' => $alamat,
            'role_id' => $role_id,
            'is_active' => $is_active,
			'created_at' => $created_at
		);

		$this->M_Superadmin->updateDataAdmin($id, $arrUpdate);
		redirect(base_url('admin/Superadmin'));

		// test code
		// echo '<pre>';
		// print_r($arrUpdate);
		// echo '</pre>';
	}

	public function deleteAdminFunc($id)
	{
		$this->M_Superadmin->deleteDataAdmin($id);
		redirect(base_url('admin/Superadmin'));
	}
}

?>