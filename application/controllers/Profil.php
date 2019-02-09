<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->is_login(TRUE);
		$this->load->model('m_pengguna');
		$this->load->model('m_proposal');
		$this->load->model('m_ormawa');
		$this->load->model('m_alumni');
	}

	public function compose_view($main_view, $data)
	{
		$data['jumlah_request'] = $this->m_proposal->jumlah_request();
		$data['jumlah_spjlpj'] = $this->m_proposal->ambil_jumlah_spjlpj();
		$data['jumlah_legalisir'] = $this->m_alumni->ambil_jumlah_legalisir();
		$this->load->view('template/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('template/footer');
	}

	public function index()
	{
		$data['title'] = "Profil";
		$data['active'] = "profil";
		$data['profil_admin'] = $this->m_pengguna->ambil_pengguna_byid($this->session->userdata('id_pengguna'));
		$data['profil_ormawa'] = $this->m_ormawa->ambil_ormawa_byid($this->session->userdata('id_pengguna'));
		$data['profil_alumni'] = $this->m_alumni->ambil_profil_byid($this->session->userdata('id_pengguna'));

		if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4 || $this->session->userdata('level') == 5) {
			$this->compose_view('profil/profil_admin', $data);
		}elseif($this->session->userdata('level') == 2) {
			$this->compose_view('profil/profil_ormawa', $data);
		}elseif($this->session->userdata('level') == 3) {
			$this->compose_view('profil/profil_alumni', $data);
		}
	}

	public function edit_profil_form() {
		$this->load->library('image_lib');
	    $this->load->library('upload');

		// upload foto
		if(file_exists($_FILES['foto_baru']['tmp_name']) || is_uploaded_file($_FILES['foto_baru']['tmp_name'])) {
			$config['upload_path'] = "./assets/img/profil/";
	        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|img|psd|tiff|wmf';
	        $config['max_width'] = "5000";
	        $config['max_height'] = "5000";
	        $this->upload->initialize($config);

        	if ($this->upload->do_upload('foto_baru')) 
	        {
	            $upload = $this->upload->data();
	            $nama_foto = $upload['file_name'];
	            $thumbnail_foto = str_replace($upload['file_ext'], "_thumb" . $upload['file_ext'], $upload['file_name']);
	         
	            $this->create_thumbnail($upload['file_name'], $config['upload_path']);

	            if (file_exists("./assets/img/profil/" . $this->input->post('foto')))
                	unlink("./assets/img/profil/" . $this->input->post('foto'));   
	            if (file_exists("./assets/img/profil/" . $this->input->post('thumbnail'))) 
	                unlink("./assets/img/profil/" . $this->input->post('thumbnail'));
	            
	            $data = array(
		            'foto' => $nama_foto,
		            'thumbnail' => $thumbnail_foto
				);
				$this->m_pengguna->edit_pengguna($this->session->userdata('id_pengguna'), $data);
				$this->session->set_userdata('foto', $nama_foto);
				$this->session->set_userdata('thumbnail', $thumbnail_foto);
	        }
	    }

		if($this->input->post('password') != '') {
			$data = array(
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);
			$this->m_pengguna->edit_pengguna($this->session->userdata('id_pengguna'), $data);
		}

		if($this->session->userdata('level') == 2) {
			$data = array(
				'nama_ormawa' => $this->input->post('nama_ormawa'),
	            'ketua_organisasi' => $this->input->post('ketua_organisasi'),
	            'wakil_ketua' => $this->input->post('wakil_ketua'),
	            'profil_organisasi' => $this->input->post('profil_organisasi'),
	            'email' => $this->input->post('email'),
	            'no_hp' => $this->input->post('no_hp')
			);
			$this->m_ormawa->edit_ormawa($this->session->userdata('id_ormawa'), $data);
			
			$this->session->set_userdata('nama', $this->input->post('nama_ormawa'));
		}

		if($this->session->userdata('level') == 3) {
			if(file_exists($_FILES['file_ijazah']['tmp_name']) || is_uploaded_file($_FILES['file_ijazah']['tmp_name'])) {
				$config['upload_path'] = './assets/lampiran/';
				$config['allowed_types'] = '*';
				$config['remove_spaces']  = TRUE;
	        	$this->upload->initialize($config);

				if(!$this->upload->do_upload('file_ijazah'))
				{
					echo $config['upload_path'];
					echo $this->upload->display_errors();
				}else {
		            if (file_exists("./assets/lampiran/" . $this->input->post('ijazah')))
	                	unlink("./assets/lampiran/" . $this->input->post('ijazah'));   

					$upload = $this->upload->data();
					$data = array(
						'file_ijazah' => $upload['file_name']
					);
					$this->m_alumni->edit_alumni($this->session->userdata('id_alumni'), $data);
				}
			}

			if(file_exists($_FILES['file_transkrip']['tmp_name']) || is_uploaded_file($_FILES['file_transkrip']['tmp_name'])) {
				$config['upload_path'] = './assets/lampiran/';
				$config['allowed_types'] = '*';
				$config['remove_spaces']  = TRUE;
	        	$this->upload->initialize($config);

				if(!$this->upload->do_upload('file_transkrip'))
				{
					echo $config['upload_path'];
					echo $this->upload->display_errors();
				}else {
					if (file_exists("./assets/lampiran/" . $this->input->post('transkrip')))
	                	unlink("./assets/lampiran/" . $this->input->post('transkrip'));   

					$upload = $this->upload->data();
					$data = array(
						'file_transkrip' => $upload['file_name']
					);
					$this->m_alumni->edit_alumni($this->session->userdata('id_alumni'), $data);
				}
			}

			$data = array(
				'nim' => $this->input->post('nim'),
	            'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
	            'prodi' => $this->input->post('prodi'),
	            'strata' => $this->input->post('strata'),
	            'tahun_lulus' => $this->input->post('tahun_lulus'),
	            'yudisium_ke' => $this->input->post('yudisium_ke'),
	            'no_ijazah' => $this->input->post('no_ijazah'),
	            'no_seri_transkrip' => $this->input->post('no_seri_transkrip'),
	            'no_hp' => $this->input->post('no_hp'),
	            'alamat' => $this->input->post('alamat')
			);
			$this->m_alumni->edit_alumni($this->session->userdata('id_alumni'), $data);
			
			$this->session->set_userdata('nama', $this->input->post('nama_mahasiswa'));
		}
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Profil Berhasil Diperbarui!</div>');

		redirect('profil');
	}

	public function create_thumbnail($file_name, $upload_path) {
		// thumbnail config
		$this->image_lib->clear();
		$config=array();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $upload_path . $file_name;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 200;
        $config['height']       = 200;
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
	}
}
