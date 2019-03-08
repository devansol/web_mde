<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_admin extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('model');
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		// $output = $this->model->get_kode_barang();
		$this->load->view('admin/header');
		$this->load->view('modal/view_modal_alert');
		$this->load->view('admin/view_login_admin');
		$this->load->view('footer');
	}

	public function dashboard(){
		$this->load->view('admin/header');
		$this->load->view('modal/view_modal_alert');
		$this->load->view('admin/view_dashboard_admin');
		$this->load->view('footer');
	}

	public function add_product(){
		$this->load->view('admin/header');
		$this->load->view('modal/view_modal_alert');
		$this->load->view('admin/view_add_data_barang');
		$this->load->view('footer');
	}

	public function edit(){
		$this->load->view('admin/header');
		$this->load->view('modal/view_modal_alert');
		$this->load->view('admin/view_edit_data');
		$this->load->view('footer');
	}

	public function slide(){
		$this->load->view('admin/header');
		$this->load->view('modal/view_modal_alert');
		$this->load->view('admin/view_edit_slide');
		$this->load->view('footer');
	}

	public function insert(){
		// echo"window.location(".base_url().")";
		$harga = str_replace(',','',$this->input->post('harga_barang'));
		$harganew = substr(str_replace('.','', $harga),'0','5');
		$data = array(
			'nama_barang'=> $this->input->post('nama_barang'),
			'harga_barang' =>  $harganew,
			'gambar_barang' => $_FILES['gambar_barang']['name'],
			'keterangan' => $this->input->post('keterangan'),
			'kode_barang' => $this->input->post('kode_barang')
		);
		// echo "<pre/>";
		// var_dump($harganew);
		// exit();
	
		$config['upload_path']          = './gambar/produk/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 10000;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('gambar_barang')){
			$output = array('error' => $this->upload->display_errors());
		}else{
			$output = array('upload_data' => $this->upload->data());
			$output = $this->model->insert_produk($data);
		}
	
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));
	}

	public function get_kode_barang(){
		$max_kode = $this->model->get_kode_barang();

		$new_kode = $max_kode['kode_barang'];

		$noUrut = (int) substr($new_kode, 2, 4);

		$noUrut++;
		$char = "BR";
		$output = array (
			'kode_barang' => $char . sprintf("%04s", $noUrut),
		);

		
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));
	}

	public function login_admin(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$output = $this->model->login_admin($data);
		// echo"<pre/>";
		// var_dump($output);
		// exit();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));
	}

	public function logout(){
		$this->session->unset_userdata('login');
		session_destroy();
		redirect(base_url()."admin");
	}

	public function delete_barang(){
		$data = array(
			'id' => $this->input->post('id')
		);
		$output = $this->model->delete_barang($data);

		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));

	}

	public function update(){
		$data = array(
			'nama_barang'=> $this->input->post('nama_barang'),
			'harga_barang' =>  $this->input->post('harga'),
			'keterangan' => $this->input->post('ket'),
			'id' => $this->input->post('id')
		);

		$output = $this->model->update($data);
		
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));
	}

	public function get_slide(){
		$output = $this->model->get_slide();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));
	}

	public function insert_slide(){
		$data = array(
			'slide1' => $_FILES['slide_1']['name'],
			'slide2' => $_FILES['slide_2']['name'],
			'slide3' => $_FILES['slide_3']['name']
		);

		$config['upload_path']          = './gambar/slide/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 10000;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('slide_1') && !$this->upload->do_upload('slide_2') && !$this->upload->do_upload('slide_3')){
			$output = array('error' => $this->upload->display_errors());
		}else{
			$output = array('upload_data' => $this->upload->data());
			$result = $this->model->get_slide();
		
			if(count($result) == 0) {
				$output = $this->model->insert_slide($data);
			}else{
				$data = array(
					'slide1' => $_FILES['slide_1']['name'],
					'slide2' => $_FILES['slide_2']['name'],
					'slide3' => $_FILES['slide_3']['name'],
					'id_slide' => $result[0]->id_slide
				);
				// echo"<pre/>";
				// var_dump($data);
				// exit();
				$output = $this->model->update_slide($data);
			}
		}
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));
	}
}
