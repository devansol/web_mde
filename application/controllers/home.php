<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('model');
		$this->load->helper('url');
		// $this->load->library('session');
	}

	public function index() {
		$output['result'] = $this->model->get_produk_all();
		// echo "<pre/>";
		// var_dump($output['result']);
		// exit();	
		$this->load->view('header');
		$this->load->view('view_slide');
		$this->load->view('modal/view_modal_alert');
		$this->load->view('view_dashboard',$output);	
		$this->load->view('footer');
	}

	public function produk() {
		$this->load->view('header');
		$this->load->view('modal/view_modal_alert');
		$this->load->view('view_product');	
		$this->load->view('footer');
	}
	
	public function detail_product($param) {
		$data = array (
			'id_barang' => $param
		);
		$output['result'] = $this->model->get_produk_by_kode($data);
		$this->load->view('header');
		$this->load->view('modal/view_modal_alert');
		$this->load->view('view_detail',$output);	
		$this->load->view('footer');
	}
}
