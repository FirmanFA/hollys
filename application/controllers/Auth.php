<?php

class Auth extends CI_Controller
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
		// membuat agar user tidak kembali ke halaman login setelah melakukan login tanpa logout
		if ($this->session->userdata('email')) {
			redirect('users');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		// jika gagal login, maka berikan pesan gagal
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}
		// menjalankan halaman login 
		else {
			// method _login() bersifat private.
			$this->_login(); // di arahkan ke method login agar baris kode tidak panjang2.
		}
	}


	private function _login()
	{
		// simpan data yang dikirim dari form ke dalam variabel email dan password
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// memeriksa apakah data user terdapat di dalam database atau tidak
		// SELECT * FROM users where email = $email
		$users = $this->db->get_where('users', ['email' => $email])->row_array();

		// jika data user ada di database, loginkan user ke halaman home/index
		if ($users) {
			// jika usernya aktif
			if ($users['is_active'] == 1) {
				// cek password dulu, kalau benar maka kode di bawah akan dijalankan
				if (password_verify($password, $users['password'])) {
					$cookie = array(

						'name'   => 'user_id',
						'value'  => $users['id'],
						'expire' => '604800',
						'secure' => TRUE

					);
					$cookieName = array(

						'name'   => 'username',
						'value'  => $users['namadepan'].' '.$users['namabelakang'],
						'expire' => '604800',
						'secure' => TRUE

					);

					$this->input->set_cookie($cookie);
					$this->input->set_cookie($cookieName);
					// kalau passwordnya benar, kita cek email dan role nya (apakah admin atau member)
					$data = [
						'email' => $users['email'],
						'role_id' => $users['role_id']
					];
					// set user data-nya
					$this->session->set_userdata($data);
					// kalau member, arahkan ke controller member
					if ($data['role_id'] == 2) {
						redirect('users');
					}
					else {
						redirect(base_url('admin'));
					}
					
				}
				// jika password salah
				else {
					// berikan pesan gagal login karena password salah
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-danger" role="alert">
							Password Anda salah!
						</div>'
					);
					redirect('auth');
				}
			}
			// jika user tidak aktif
			else {
				// berikan pesan gagal login karena data tidak ada di database.
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">
						Email Anda belum aktif!
					</div>'
				);
				redirect('auth');
			}
		}
		// jika tidak ada di database, user tidak boleh login.
		else {
			// berikan pesan gagal login karena data tidak ada di database.
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">
					Email Anda belum terdaftar!
		  		</div>'
			);
			redirect('auth');
		}
	}


	public function register()
	{
		// membuat rules untuk form validation agar register bisa dilakukan
		// kotak inputan register tidak boleh kosong
		$this->form_validation->set_rules('namadepan', 'Nama Depan', 'required|trim');
		$this->form_validation->set_rules('namabelakang', 'Nama Belakang', 'required|trim');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[users.email]',
			['email' => 'Email sudah terdaftar.']
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[3]|matches[password2]',
			[
				'matches' => 'Kata Sandi tidak sama.',
				'min_length' => 'Kata Sandi terlalu pendek'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) { // jika register gagal, tampilkan kembali halaman register
			$data['title'] = 'User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
		} else {
			// ambil data dari form, masukkan ke database
			$data = [
				'namadepan' => htmlspecialchars($this->input->post('namadepan', true)),
				'namabelakang' => htmlspecialchars($this->input->post('namabelakang', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'nohp' => htmlspecialchars($this->input->post('nohp', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'role_id' => '2',
				'is_active' => '1',
				'created_at' => time()
			];

			// insert ke database table
			$this->db->insert('users', $data);
			// membuat pesan berhasil melakukan register
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success" role="alert">
					Akun Anda berhasil dibuat. Silakan melakukan login.
		  		</div>'
			);
			// redirect ke auth login page setelah melakukan register
			redirect('auth');
		}
	}

	public function logout()
	{
		// membersihkan session dan mengembalikan ke halaman login
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
				Anda berhasil Logout.
			  </div>'
		);
		// redirect ke auth login page setelah melakukan logout
		redirect('auth');
	}
}
