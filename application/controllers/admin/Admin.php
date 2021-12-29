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
        redirect('admin/menus');
		
	}

	public function profile(){

		$userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
		$dataUser = array(
			'username' => $userData['namadepan'].' '.$userData['namabelakang'],
			'image' => $userData['image']
		);

		$data['users'] = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();

		
		$this->load->view('admin/templates/header', $dataUser);
		$this->load->view('admin/profile',$data);
		$this->load->view('admin/templates/footer');

	}

	public function updateProfile(){
		$data['title'] = 'Update Profil';
        $data['users'] = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();

        $this->form_validation->set_rules('namadepan', 'Nama Depan', 'required|trim');
        $this->form_validation->set_rules('namabelakang', 'Nama Belakang', 'required|trim');
        $this->form_validation->set_rules('nohp', 'No HP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

			$userData = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
			$dataUser = array(
				'username' => $userData['namadepan'].' '.$userData['namabelakang'],
				'image' => $userData['image']
			);
		
			$this->load->view('admin/templates/header', $dataUser);
			$this->load->view('admin/updateProfile', $data);
			$this->load->view('admin/templates/footer');
        }
        else {
            $namadepan = $this->input->post('namadepan');
            $namabelakang = $this->input->post('namabelakang');
            $email = $this->input->post('email');
            $nohp = $this->input->post('nohp');
            $alamat = $this->input->post('alamat');


            $new_photo = "default.jpg";
            // cek jika yang dikirim user adalah benar-benar file foto
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/images/profile';

            $this->load->library('upload', $config);

            // cek apakah gambar yang diupload berhasil?
            if ($this->upload->do_upload('image')) {
                
                // ambil nama file terbaru, kemudian masukkan ke database
                $new_photo = $this->upload->data('file_name');
            }
            // jika gagal upload gambar
            else {
                echo $this->upload->display_errors();
            }
            
            $arrUpdate = array(
                'namadepan' => $namadepan,
                'namabelakang' => $namabelakang,
                'email' => $email,
                'image' => $new_photo,
                'nohp' => $nohp,
                'alamat' => $alamat
            );

            $this->db->where('email', $email);
            $this->db->update('users', $arrUpdate);

            // membuat pesan berhasil melakukan update
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success" role="alert">
					Akun Anda berhasil diupdate.
		  		</div>'
			);
			// redirect ke auth login page setelah melakukan register
			redirect('admin/profile');
        }
	}

}
