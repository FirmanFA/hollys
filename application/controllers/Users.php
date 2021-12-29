<?php

class Users extends CI_Controller
{
    public function index() {
        $data['title'] = 'Home Page';
        $data['users'] = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
		$this->load->view('templates/header_user', $data);
		$this->load->view('foodpageUser/index');
		$this->load->view('templates/footer');
    }
    
    public function profile() {
        $data['title'] = 'Profil Saya';
        $data['users'] = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();
        $this->load->view('templates/header_user', $data);
        $this->load->view('users/profile');
        $this->load->view('templates/footer');

    }

    public function update() {
        $data['title'] = 'Update Profil';
        $data['users'] = $this->db->get_where('users', 
                                            [ 'email' => $this->session->userdata('email') ] 
                        ) -> row_array();

        $this->form_validation->set_rules('namadepan', 'Nama Depan', 'required|trim');
        $this->form_validation->set_rules('namabelakang', 'Nama Belakang', 'required|trim');
        $this->form_validation->set_rules('nohp', 'No HP', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_user', $data);
            $this->load->view('users/update', $data);
            $this->load->view('templates/footer');
        }
        else {
            $namadepan = $this->input->post('namadepan');
            $email = $this->input->post('email');

            // cek jika user mengupload foto profil baru 
            $upload_photo = $_FILES['image'];

            // cek jika yang dikirim user adalah benar-benar file foto
            if ($upload_photo) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/images/profile';

                $this->load->library('upload', $config);

                // cek apakah gambar yang diupload berhasil?
                if ($this->upload->do_upload('image')) {
                    // tumpuk file photo lama menjadi terbaru
                    $old_photo = $data['users']['image'];
                    if ($old_photo != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/profile' . $old_photo);
                    }
                    // ambil nama file terbaru, kemudian masukkan ke database
                    $new_photo = $this->upload->data('file_name');
                    $this->db->set('image', $new_photo);
                }
                // jika gagal upload gambar
                else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('namadepan', $namadepan);
            $this->db->where('email', $email);
            $this->db->update('users');

            // membuat pesan berhasil melakukan update
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success" role="alert">
					Akun Anda berhasil diupdate.
		  		</div>'
			);
			// redirect ke auth login page setelah melakukan register
			redirect('users/profile');
        }
    }
}