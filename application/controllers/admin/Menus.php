<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Menu');
		$this->load->library('pagination');
	}

    public function index($num = '')
    {

		$perpage = 5;
		
		$config['base_url'] = base_url('admin/menus');
		$config['total_rows'] = $this->M_Menu->getMenuCount();
        $config['per_page'] = $perpage;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $this->M_Menu->getMenuCount() / $perpage;
        $config["num_links"] = floor($choice);

		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		

		$DATA['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$queryAllMenus = $this->M_Menu->getAllMenu('',$perpage, $DATA['page']);
        $DATA['queryAllMenus'] = $queryAllMenus;
		$DATA['pagination'] = $this->pagination->create_links();
        // echo '<pre>';
		// print_r($queryAll);
		// echo '<pre>';


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

		$userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/addMenus.php');
		$this->load->view('admin/templates/footer');
	}

	public function addMenusFunc()
	{
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['upload_path'] = './assets/images/menu';

		$this->load->library('upload', $config);

		// cek apakah gambar yang diupload berhasil?
		if ($this->upload->do_upload('image')) {
			// ambil nama file terbaru, kemudian masukkan ke database
			$photo = $this->upload->data('file_name');

			$name = $this->input->post('name');
			$type = $this->input->post('type');
			$price = $this->input->post('price');
			$image = $photo;
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
		}else{
			echo $this->upload->display_errors();
		}
		// $id = $this->input->post('id');
		

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

		$userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/updateMenus.php', $DATA);
		$this->load->view('admin/templates/footer');
	}

	

	public function updateMenusFunc()
	{

		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['upload_path'] = './assets/images/menu';

		$this->load->library('upload', $config);

		// cek apakah gambar yang diupload berhasil?
		if ($this->upload->do_upload('image')) {
			$photo = $this->upload->data('file_name');

			$id = $this->input->post('id');
			$name = $this->input->post('name');
			$type = $this->input->post('type');
			$price = $this->input->post('price');
			$image = $photo;

			$arrUpdate = array(
				'name' => $name,
				'type' => $type,
				'price' => $price,
				'image' => $image
			);

			$this->M_Menu->updateDataMenus($id, $arrUpdate);
			redirect(base_url('admin/Menus'));

		}
	}

	public function deleteMenusFunc($id)
	{
		$this->M_Menu->deleteDataMenus($id);
		redirect(base_url('admin/Menus'));
	}
}

?>