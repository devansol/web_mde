<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_function extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('model');
		// $this->load->helper('url');
		// $this->load->library('session');
	}

	public function get_produk(){
		$output = $this->model->get_produk_all();
		$this->load->view('view_dashboard');
		
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));
	}

	public function search_produk(){
		$data = array(
			'value' => $this->input->post('value')
		);
		// echo"<pre/>";
		// var_dump($data);
		// exit();
		$output = $this->model->search($data);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($output));
	}

	public function update($param) {

		$data = array (
			'id_barang' => $param
		);
		// echo"<pre/>";
		// var_dump($data);
		// exit();
		$output['result'] = $this->model->get_produk_by_kode($data);
		$this->load->view('header');
		$this->load->view('modal/view_modal_alert');
		$this->load->view('admin/view_edit_data_barang',$output);	
		$this->load->view('footer');
	}
}
