<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Menu');
	}

    public function index()
    {
        $queryAllMenus = $this->M_Menu->getAllMenu('');
        // echo '<pre>';
		// print_r($queryAll);
		// echo '<pre>';

        $DATA = array('queryAllMenus' => $queryAllMenus);

        $userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/menus',$DATA);
		$this->load->view('admin/templates/footer');
    }

    public function addMenus()
	{
		$this->load->view('admin/addMenus.php');
	}

	public function addMenusFunc()
	{
		// $id = $this->input->post('id');
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$price = $this->input->post('price');
		$image = $this->input->post('image');
		$created_at = $this->input->post('created_at');
		$updated_at = $this->input->post('created_at'); # sama dengan created_at karena pertama kali dibuat

		$arrInsert = array(
			// 'id' => $id, auto increment
			'name' => $name,
			'type' => $type,
			'price' => $price,
			'image' => $image,
			'created_at' => $created_at,
			'updated_at' => $updated_at
		);

		$this->M_Menu->insertDataMenus($arrInsert);
		redirect(base_url('admin/Menus'));

		// echo '<pre>';
		// print_r($arrInsert);
		// echo '</pre>';
	}

	public function updateMenus($id)
	{
		$queryDetailMenus = $this->M_Menu->getDataDetailMenus($id);
		// echo '<pre>';
		// print_r($queryDetailMenus);
		// echo '</pre>';

		$DATA = array('queryDetailMenus' => $queryDetailMenus);
		$this->load->view('admin/updateMenus.php', $DATA);
	}

	

	public function updateMenusFunc()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$price = $this->input->post('price');
		$image = $this->input->post('image');
		$created_at = $this->input->post('created_at');
		$updated_at = $this->input->post('updated_at');

		$arrUpdate = array(
			'name' => $name,
			'type' => $type,
			'price' => $price,
			'image' => $image,
			// 'created_at' => $created_at, Tidak diupdate
			'updated_at' => $updated_at
		);

		$this->M_Menu->updateDataMenus($id, $arrUpdate);
		redirect(base_url('admin/Menus'));

		// test code
		// echo '<pre>';
		// print_r($arrUpdate);
		// echo '</pre>';
	}

	public function deleteMenusFunc($id)
	{
		$this->M_Menu->deleteDataMenus($id);
		redirect(base_url('admin/Menus'));
	}
}

?>